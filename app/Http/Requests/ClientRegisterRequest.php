<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required',
            'password' => ['required', 'min:6', 'string', 'confirmed'],
            'd_o_b' => 'required|date',
            'last_donation_date' => 'required|date',
            'blood_type_id' => 'required',
            'city_id' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'password' => 'كلمة المرور',
            'd_o_b' => 'تاريخ الميلاد',
            'last_donation_date' => 'تاريخ أخر تبرع',
            'blood_type_id' => 'فصيلة الدم',
            'city_id' => 'المدينة الحالية',

        ];
    }
}
