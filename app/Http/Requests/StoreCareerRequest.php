<?php

namespace App\Http\Requests;

use App\Models\Career;
use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'cv' => 'required|file|mimes:pdf|max:4048', // Only allow PDF uploads, max size 2MB
            'captcha' => 'required|captcha' // CAPTCHA validation
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $existingCareer = Career::where('email', $this->email)
                                    ->where('phone_number', $this->phone_number)
                                    ->first();

            if ($existingCareer) {
                $validator->errors()->add('email', 'This email and phone number combination already exists.');
            }
        });
    }

    public function messages()
    {
        return [
            'cv.mimes' => 'The CV must be a file of type: pdf.',
            'captcha.captcha' => 'Invalid CAPTCHA.',
        ];
    }
}
