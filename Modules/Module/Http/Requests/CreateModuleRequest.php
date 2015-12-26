<?php namespace Modules\Module\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateModuleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'packagist_url' => 'required|unique:module__modules,packagist_url',
            'vendor' => 'required',
            'name' => 'required',
            'excerpt' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'documentation' => 'required',
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
