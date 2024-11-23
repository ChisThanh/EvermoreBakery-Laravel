<?php

declare(strict_types=1);

namespace App\Traits;

/**
 * Created by ChisThanh.
 * User: ChisThanh
 * Date: 23/11/2024
 */

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait Searchable
 * @package App\Traits
 * @property array $searchableColumns
 * @property array $joins
 * @property array $dateColumns
 * @method static \Illuminate\Database\Eloquent\Builder search(string $term, array $option = [])
 */

trait Searchable
{
    protected $searchableColumns = [
        'name',
        'description',
        'categories.name'
    ];

    protected $joins = [
        [
            'table' => 'categories',
            'first' => 'products.category_id',
            'operator' => '=',
            'second' => 'categories.id',
            'type' => 'LEFT'
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
        if (empty($this->searchableColumns)) 
            throw new \Exception('Class must declare $searchableColumns property.');
        
        if(env('DB_CONNECTION') !== 'mysql') 
            throw new \Exception('Searchable trait only support for MySQL database.');
    }


    /**
     * @param $query
     * @param string $term
     * @param array $option
     * @return mixed
     */
    public function scopeSearch(Builder $query, string $term, array $option = []): mixed
    {
        // ALTER TABLE products
        // ADD FULLTEXT(name, description);

        if (empty($term) || $term === ' ')
            return $query;

        if (!empty($this->joins) && is_array($this->joins)) {
            foreach ($this->joins as $join) {
                $joinType = strtoupper($join['type'] ?? 'INNER');
                $query->join($join['table'], $join['first'], $join['operator'], $join['second'], $joinType);
            }
        }

        $term = $this->cleanSearchTerm($term);
        $query = $this->generateTerm($query, $term);

        if (!empty($option) && is_array($option)) {
            $query->where(function ($q) use ($option) {
                foreach ($option as $value) {
                    $operator = $this->parseOperator($value['operator'] ?? '=');

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

        if (!empty($option['sort']) && is_array($option['sort'])) {
            foreach ($option['sort'] as $field => $direction) {
                $query->orderBy($field, $direction);
            }
        }

        return $query;
    }

    protected function generateTerm(Builder $query, string $term): Builder
    {
        $str = '';
        $other = [];

        foreach ($this->searchableColumns as $column) {
            if (strpos($column, '.') === false)
                $str .= $column . ',';
            else
                $other[] = $column;
        }

        $str = rtrim($str, ',');
        $query->whereRaw("MATCH ($str) AGAINST (? IN BOOLEAN MODE)", [$term]);

        if (!empty($other)) {
            $column = implode(',', $other);
            $query->orWhereRaw("MATCH ({$column}) AGAINST (? IN BOOLEAN MODE)", [$term]);
        }

        return $query;
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
     * @param string $term
     * @return string
     */
    protected function cleanSearchTerm(string $term): string
    {
        $term = htmlspecialchars($term, ENT_QUOTES, 'UTF-8');
        $term = preg_replace(
            '/[^\w\s.-áàảãạăắằẳẵặâấầẩẫậêếềểễệíìỉĩịôốồổỗộơớờởỡợưứừửữựđáàảãạăắằẳẵặâấầẩẫậêếềểễệíìỉĩịôốồổỗộơớờởỡợưứừửữựđ]/u',
            '',
            $term
        );
        return trim($term);
    }
}
