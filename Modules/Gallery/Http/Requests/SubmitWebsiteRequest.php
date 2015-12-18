<?php namespace Modules\Gallery\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitWebsiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'website_url' => 'required',
            'message' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }
}
