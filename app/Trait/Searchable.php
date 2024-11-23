<?php
/**
 * Created by ChisThanh.
 * User: ChisThanh
 * Date: 23/11/2024
 */

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait Searchable
 * @package App\Traits
 * @property array $searchable
 * @property array $dateColumns
 * @method static \Illuminate\Database\Eloquent\Builder search(string $search, array $option = [])
 */

trait Searchable
{
    protected $searchable = [
        'columns' => [
            'users.first_name',
            'users.last_name',
            'posts.title',
        ],
        'joins' => [
            'posts' => ['users.id', 'posts.user_id'],
        ]
    ];

    protected $dateColumns = [];

    /**
     * Boot the searchable trait for a model.
     *
     * @return void
     * @throws \Exception
     */
    public function bootSearchable(): void
    {
        if (empty($this->searchable['columns']))
            throw new \Exception('Class must declare $searchable property.');

        if (env('DB_CONNECTION') !== 'mysql')
            throw new \Exception('Searchable trait only support for MySQL database.');
    }

    /**
     * @param $query
     * @param string $search
     * @param array $option
     * @return mixed
     */
    public function scopeSearch(Builder $q, string $search, array $option = []): mixed
    {
        // ALTER TABLE products
        // ADD FULLTEXT(name, description);
        $query = clone $q;

        if (empty($search) || $search === '')
            return $query;

        $query = $this->makeJoin($query);
        $search = $this->cleanSearchTxt($search);
        $query = $this->generateSearch($query, $search);

        if (!empty($option) && is_array($option)) {
            $query->where(function ($q) use ($option) {
                foreach ($option as $value) {
                    $operator = $this->parseOperator($value['operator'] ?? 'eq');

                    if ($this->isDateColumn($value['column']))
                        $q->whereDate($value['column'], $operator, $value['q']);
                    elseif ($operator === 'in' && is_array($value['q']))
                        $q->whereIn($value['column'], $value['q']);
                    elseif ($operator === 'not in' && is_array($value['q']))
                        $q->whereNotIn($value['column'], $value['q']);
                    elseif ($operator === 'between' && is_array($value['q']))
                        $q->whereBetween($value['column'], $value['q']);
                    elseif ($operator === 'or' && is_array($value['q']))
                        foreach ($value['q'] as $v)
                            $q->orWhere($value['column'], $v);
                    else
                        $q->where($value['column'], $operator, $value['q']);
                }
            });
        }
        return $query;
    }

    protected function makeJoin(Builder $query): Builder
    {
        $joins = $this->searchable['joins'] ?? [];
        if (!empty($joins) && is_array($joins))
            foreach ($joins as $table => $join)
                $query->leftJoin($table, $join[0], '=', $join[1]);
        return $query;
    }

    protected function generateSearch(Builder $query, string $search): Builder
    {
        $groupedColumns = [];

        foreach ($this->searchable['columns'] as $column) {
            if (strpos($column, '.') === false) {
                $groupedColumns['default'][] = $column;
            } else {
                [$table, $_] = explode('.', $column, 2);
                $groupedColumns[$table][] = $column;
            }
        }

        foreach ($groupedColumns as $table => $columns) {
            $columnList = implode(',', $columns);

            if ($table === 'default')
                $query->whereRaw("MATCH ($columnList) AGAINST (? IN BOOLEAN MODE)", [$search]);
            elseif ($table === $this->getTable())
                $query->whereRaw("MATCH ($columnList) AGAINST (? IN BOOLEAN MODE)", [$search]);
            else
                $query->orWhereRaw("MATCH ({$columnList}) AGAINST (? IN BOOLEAN MODE)", [$search]);
        }

        return $query;
    }


    /**
     * Check if the column is a date column.
     *
     * @param $column
     * @return bool
     */
    protected function isDateColumn($column): bool
    {
        return in_array($column, $this->columnDate());
    }

    /**
     * Get the date columns.
     *
     * @return array
     */
    protected function columnDate(): array
    {
        return array_merge(['created_at', 'updated_at'], $this->dateColumns ?? []);
    }

    /**
     * Clean the search term to prevent SQL injection and other malicious input.
     *
     * @param string $search
     * @return string
     */
    protected function cleanSearchTxt(string $search): string
    {
        $search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
        $search = preg_replace('/[^\p{L}\p{N}\s.-]/u', '', $search);
        return trim($search);
    }

    /**
     * Map operator aliases to SQL operators.
     *
     * @param string $operator
     * @return string
     */
    protected function parseOperator(string $operator): string
    {
        return match ($operator) {
            'eq' => '=',
            'ne' => '!=',
            'gt' => '>',
            'lt' => '<',
            'gte' => '>=',
            'lte' => '<=',
            'like' => 'like',
            'in' => 'in',
            'nin' => 'not in',
            'bw' => 'between',
            'or' => 'or',
            default => '=',
        };
    }
}
