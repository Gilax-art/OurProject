<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
            'status_ru' => 'required',
            'status_en' => 'required',
            'img' => ['file','required']
        ];
    }
    public function messages(): array
    {
        return [
            'title_ru.required' => 'The title_ru field is required',
            'title_en.required' => 'The title_en field is required',
            'status_ru.required' => 'The status_ru field is required',
            'status_en.required' => 'The status_en field is required',
            'img.required' => 'The img field is required',
        ];
    }
}
