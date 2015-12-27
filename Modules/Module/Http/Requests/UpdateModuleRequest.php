<?php namespace Modules\Module\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route()->getParameter('singleModule')->id;

        return [
            'packagist_uri' => 'required|unique:module__modules,packagist_uri,' . $id,
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
