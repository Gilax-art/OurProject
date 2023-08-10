<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewsUpdateRequest extends FormRequest
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
            'name_ru' => 'required',
            'name_en' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name_ru.required' => 'A name_ru is required',
            'name_en.required' => 'A name_en is required',
            'text_ru.required' => 'A text_ru is required',
            'text_en.required' => 'A text_en is required',
        ];
    }
}
