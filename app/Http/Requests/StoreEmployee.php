<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:255',
            'phone_no' => 'required|min:6|max:10',
            'address' => 'required|min:3|max:255',
            'nrc_no' => 'required|string',
            'birthday' => 'required|date',
            'department_id' => 'required',
            'gender' => 'required',
            'date_of_join' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the name.',
            'name.min:3' => 'Name must includes 3 letters minimum',
            'email.required' => 'Please enter the email.',
            'phone_no.required' => 'Please enter the phone number.',
            'address.required' => 'Please enter the address.',
            'nrc_no.required' => 'Please enter the nrc_no.',
            'birthday.required' => 'Please select the birthday.',
            'department_id.required' => 'Please select a department.',
            'gender.required' => 'Please select the gender.',
            'date_of_join.required' => 'Please select the date of employment.',
        ];
    }
}
