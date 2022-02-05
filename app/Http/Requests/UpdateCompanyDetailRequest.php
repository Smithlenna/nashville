<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => ['required', 'string'],
            'registration' => ['required', 'string'],
            'vat' => ['required', 'string'],
            'contact_person' => ['required', 'string'],
            'address' => ['required', 'string'],
            'map' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
            'primary_number' => ['required', 'string'],
            'secondary_number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'website' => ['required', 'string'],
        ];
    }
}
