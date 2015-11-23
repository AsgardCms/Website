<div class="box-body">
    {!! Form::normalInput('name', 'Name', $errors, $testimonial) !!}
    {!! Form::normalInput('url', 'Url', $errors, $testimonial) !!}
    {!! Form::normalTextarea('content', 'Content', $errors, $testimonial) !!}
</div>
