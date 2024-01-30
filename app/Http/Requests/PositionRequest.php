<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'position_name' => 'required|unique:positions',
            'salary' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'position_name.required' => 'Please add a position name',
            'salary.required' => 'Please add a salary',
            'description.required' => 'Please add a description',

            'position_name.unique' => 'Harus ga sama',
        ];
    }
}
