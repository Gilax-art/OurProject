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
            'title' => 'required',
            'link' => 'required',
            'url' => 'required',
            'description' => '',
            'img' => 'file',
            'deadlines' => '',
            'technologies' => '',
            'review' => '',
            'screenshots.*' => 'file',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'link.required' => 'Link is required',
            'url.required' => 'URL is required',
            'description.string' => 'Description должно быть строкой',
            'img.file' => 'Image должно быть файлом',
            'deadlines.string' => 'Deadlines  должно быть строкой',
            'technologies.string' => 'Technologies должно быть строкой',
            'review.string' => 'Review должно быть строкой',
            'screenshots.*.file' => 'Screenshots должно быть файлом',
        ];
    }
}
