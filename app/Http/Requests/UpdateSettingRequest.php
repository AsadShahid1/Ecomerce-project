<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => 'required',
            'mobile_number' => 'required',
            'instagram' => 'required',
            'email' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'policy' => 'required',
            'terms' => 'required',
            'pay_mode' => 'required',
            'paypal_user' => 'required',
            'paypal_password' => 'required',
            'paypal_secret' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Address required',
            'mobile_number.required' => 'Mobile Number required',
            'instagram.required' => 'Instagram id required',
            'email.required' => 'Email is required',
            'twitter.required' => 'Twitter account required',
            'facebook.required' => 'Facebook acoount required',
            'policy.required' => 'Website Policy required',
            'terms.required' => 'Website terms and conditions',
            'pay_mode.required' => 'Pay moderequired',
            'paypal_user.required' => 'User required',
            'paypal_password.required' => 'Password required',
            'paypal_secret.required' => ' Secret key is required',
        ];
    }
}

