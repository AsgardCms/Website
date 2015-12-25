<div class="box-body">
    {!! Form::i18nInput('name', 'Name', $errors, $lang, null, ['data-slug' => 'source']) !!}
    {!! Form::i18nInput('slug', 'Slug', $errors, $lang, null, ['data-slug' => 'target']) !!}
</div>
