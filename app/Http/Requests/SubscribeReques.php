<?php namespace Asguard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'email|unique'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
