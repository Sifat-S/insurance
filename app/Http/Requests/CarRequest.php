<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reg_number' => [
                'required',
                'string',
                'max:6',
                'regex:/^([ABCDEFGHIYJKLMNOPRSTUVZ]{3}[0-9]{3})$/',
                'unique:cars,reg_number',
            ],
            'brand' => 'required|string|max:30',
            'model' => 'required|string|max:128',
            'owner_id' => 'required|integer'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'reg_number' => strtoupper($this->reg_number),
        ]);
    }

    public function messages(): array
    {
        return [
            'reg_number.string' => __('The registration number must be a string.'),
            'reg_number.max' => __('The registration number must not be greater than 6 characters.'),
            'reg_number.regex' => __('The registration number must be in the format XXX000.'),
            'brand.string' => __('The brand must be a string.'),
            'brand.max' => __('The brand must not be greater than 30 characters.'),
            'model.string' => __('The model must be a string.'),
            'model.max' => __('The model must not be greater than 128 characters.'),
            'reg_number.unique' => __('The registration number has already been taken.'),
        ];
    }
}
