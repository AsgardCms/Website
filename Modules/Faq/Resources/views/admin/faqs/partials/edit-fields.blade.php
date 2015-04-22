<div class="box-body">
    {!! Form::i18nInput('question', trans('faq::faqs.question'), $errors, $lang, $faq) !!}
    {!! Form::i18nTextarea('answer', trans('faq::faqs.answer'), $errors, $lang, $faq) !!}
</div>
