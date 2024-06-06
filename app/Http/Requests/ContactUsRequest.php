<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ContactUsRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => ['required','regex:/^01[0-9]{9}$/'],
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'subject' => 'عنوان الرسالة',
            'message' => 'نص الرسالة',
           
        ];
    }
}
