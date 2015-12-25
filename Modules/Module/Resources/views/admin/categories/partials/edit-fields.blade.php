<div class="box-body">
    {!! Form::i18nInput('name', 'Name', $errors, $lang, $category, ['data-slug' => 'source']) !!}
    {!! Form::i18nInput('slug', 'Slug', $errors, $lang, $category, ['data-slug' => 'target']) !!}
</div>
