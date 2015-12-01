<?php namespace Modules\Gallery\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'website_name' => 'required',
            'website_url' => 'required',
            'owner_name' => 'required',
            'owner_url' => 'required',
        ];
    }

    public function translationRules()
    {
        return [
            'description' => 'required',
        ];
    }

    public function translationMessages()
    {
        return [
            'description.required' => 'The site description is required',
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
