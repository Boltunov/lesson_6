<?php
declare(strict_types=1);

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'news' => ['required', 'array'],
            'news.*' => ['exists:news,id'],
            'title'=> ['required', 'string', 'min:7', 'max:200'],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string', 'max:3000'],
        ];
    }
    public function getNews(): array
    {
        return $this->validated('news');
    }
}
