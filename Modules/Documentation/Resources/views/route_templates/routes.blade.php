@foreach ($files as $file)

get('docs/{{ $file }}', function() {
    $documentation = app(\Modules\Documentation\Repositories\DocumentationRepository::class);
    try {
        $title = $documentation->getTitle('{{ $file }}');
    } catch (FileNotFoundException $e) {
        abort('404');
    }

    $subtitle = $documentation->getSubTitle('{{ $file }}');
    $content = $documentation->getContent('{{ $file }}');

    return view('doc.index', compact('content', 'title', 'subtitle'));
});

@endforeach
