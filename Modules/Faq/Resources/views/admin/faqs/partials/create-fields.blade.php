<div class="box-body">
    {!! Form::i18nInput('question', trans('faq::faqs.question'), $errors, $lang) !!}
    {!! Form::i18nTextarea('answer', trans('faq::faqs.answer'), $errors, $lang) !!}
</div>
