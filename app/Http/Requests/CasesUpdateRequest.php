<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasesUpdateRequest extends FormRequest
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
            'title_ru' => 'required',
            'title_en' => 'required',
            'link' => 'required',
            'url' => 'required',
            'description_ru' => '',
            'description_en' => '',
            'img' => 'file',
            'deadlines_ru' => '',
            'deadlines_en' => '',
            'technologies_ru' => '',
            'technologies_en' => '',
            'review_ru' => '',
            'review_en' => '',
            'screenshots.*' => 'file',
        ];
    }
    public function messages(): array
    {
        return [
            'title_ru.required' => 'Title_ru is required',
            'title_en.required' => 'Title_en is required',
            'link.required' => 'Link is required',
            'url.required' => 'URL is required',
            'description_ru.string' => 'Description_ru должно быть строкой',
            'description_en.string' => 'Description_en должно быть строкой',
            'img.file' => 'Image должно быть файлом',
            'deadlines_ru.string' => 'Deadlines_ru  должно быть строкой',
            'deadlines_en.string' => 'Deadlines_en  должно быть строкой',
            'technologies_ru.string' => 'Technologies_ru должно быть строкой',
            'technologies_en.string' => 'Technologies_en должно быть строкой',
            'review_ru.string' => 'Review_ru должно быть строкой',
            'review_en.string' => 'Review_en должно быть строкой',
            'screenshots.*.file' => 'Screenshots должно быть файлом',
        ];
    }
}
