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
            'title' => 'required',
            'status' => 'required',
            'img' => ['file','required']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required',
            'status.required' => 'The status field is required',
            'img.required' => 'The img field is required',
        ];
    }
}
