<?php namespace Asgard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GithubUsernameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required|email',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
