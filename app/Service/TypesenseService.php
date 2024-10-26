<?php


namespace App\Service;
use Typesense\Client as Typesense;
class TypesenseService
{
    public mixed $client;

    public function __construct()
    {
        $config = config('scout.typesense');
        $this->client = new Typesense($config['client-settings']);
    }

    public function syncIndexKeywords(array $keywords)
    {
        $data = [];
        foreach ($keywords as $keyword) {
            $id = $this->removeVietnameseChars($keyword);
            $keyword = strtolower($keyword);

            $data[] = [
                'id' => $id,
                'keyword' => $keyword
            ];
        }
        $this->client->collections['keywords']
            ->documents
            ->import($data, ['action' => 'upsert']);
    }

    public function searchKeywords($keyword)
    {
        $searchParameters = [
            'q' => $keyword,
            'query_by' => 'keyword'
        ];

        $search = $this->client
            ->collections['keywords']
            ->documents
            ->search($searchParameters);

        return $search;
    }

    public function createCollection()
    {
        $schema = [
            "name" => "keywords",
            "fields" => [
                ["name" => "keyword", "type" => "string"]
            ],
            "query_by" => "keyword"
        ];

        $this->client->collections->create($schema);
    }



    function removeVietnameseChars($str)
    {
        $str = strtolower($str);
        $vietnameseChars = [
            'á' => 'a',
            'à' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'ạ' => 'a',
            'ă' => 'a',
            'ắ' => 'a',
            'ằ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'ặ' => 'a',
            'â' => 'a',
            'ấ' => 'a',
            'ầ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ậ' => 'a',
            'é' => 'e',
            'è' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ẹ' => 'e',
            'ê' => 'e',
            'ế' => 'e',
            'ề' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ệ' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ị' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ọ' => 'o',
            'ô' => 'o',
            'ố' => 'o',
            'ồ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ộ' => 'o',
            'ơ' => 'o',
            'ớ' => 'o',
            'ờ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ợ' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ụ' => 'u',
            'ư' => 'u',
            'ứ' => 'u',
            'ừ' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ự' => 'u',
            'ý' => 'y',
            'ỳ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'ỵ' => 'y',
            'đ' => 'd',
        ];
        $str = strtr($str, $vietnameseChars);
        $str = preg_replace('/[^a-z]/', '', $str);
        return $str;
    }
}