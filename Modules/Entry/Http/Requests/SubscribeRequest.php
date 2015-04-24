<?php namespace Modules\Entry\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:entries'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
