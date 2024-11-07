<?php


namespace App\Service;

use Gemini\Enums\ModelType;
use Gemini\Laravel\Facades\Gemini;

class GeminiService
{
    public function generateContentText($text, $model = ModelType::GEMINI_FLASH): string
    {
        $result = Gemini::generativeModel($model)->generateContent($text);
        return $result->text();
    }

    public function generateEmbedding($text)
    {
        // length 768
        $result = Gemini::embeddingModel()->embedContent($text);
        return $result->embedding->values;
    }

    public function generateKeywords($text, $model = ModelType::GEMINI_FLASH): array
    {
        $prompt = "Vui lòng tạo ra 5 từ khóa cho người dùng tìm kiếm cho nội dung sản phẩm sau: {$text}. " .
            "Các từ khóa nên được phân cách bởi ký tự '##' và định dạng như sau: " .
            "từ_khóa1##từ_khóa2##từ_khóa3##từ_khóa4##từ_khóa5. " .
            "Xin hãy đảm bảo rằng tất cả các từ khóa đều viết thường. " .
            "Vui lòng trả lời bằng tiếng Việt.";

        $result = Gemini::generativeModel($model)->generateContent($prompt);
        $result = $result->text();
        $result = str_replace("\n", "", $result);
        $array = explode('##', $result);
        return ['success' => true, 'data' => $array];
    }
}