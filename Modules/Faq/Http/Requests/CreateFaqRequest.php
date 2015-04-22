<?php namespace Modules\Faq\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFaqRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
        ];
    }

    public function translationRules()
    {
        return [
            'question' => 'required',
            'answer' => 'required',
        ];
    }

    public function translationMessages()
    {
        return [
            'question.required' => trans('faq::faqs.validation.question is required'),
            'answer.required' => trans('faq::faqs.validation.answer is required'),
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
