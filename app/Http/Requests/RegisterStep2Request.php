<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // must return true to allow validation
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentYear = date('Y');

        return [
            'company_name'      => ['required', 'string', 'max:255'],
            'company_address_line'      => ['required', 'string', 'max:255'],

            // IDs should normally be integers, not strings
            'city_id'           => ['required', 'integer', 'exists:cities,id'],
            'region_id'         => ['required', 'integer', 'exists:regions,id'],
            'country_id'        => ['required', 'integer', 'exists:countries,id'],

            'company_year_strablished'  => [
                'required',
                'digits:4',
                'integer',
                "before_or_equal:$currentYear",
            ],
            'company_site'           => ['nullable', 'url', 'max:255'],
            'company_brochure'  => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:2048', // 2MB
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'year_established.before_or_equal' => 'The year established cannot be in the future.',
        ];
    }
}
