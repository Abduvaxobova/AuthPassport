<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassportRequest extends FormRequest
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
            'passport_number' => 'string|unique:passports,passport_number,' . $this->route('id'), // ID bo'yicha noyob
            'issue_date' => 'date',
            'expiry_date' => 'date|after:issue_date',   
        ];
    }
}
