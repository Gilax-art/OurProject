<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdateRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'title_ru.required' => 'A team title_ru is required',
            'title_en.required' => 'A team title_en is required',
            'status_ru.required' => 'A status_ru is required',
            'status_en.required' => 'A status_en is required',
        ];
    }
}
