<ul class="side-menu">
    <li class="header">
        <i class="fa fa-chevron-circle-right"></i>
        Latest posts
    </li>
    <?php foreach($latestPosts as $post): ?>
    <li><a href="{{ route(locale() . '.blog.slug', [$post->slug]) }}">{{ $post->title}}</a></li>
    <?php endforeach; ?>
</ul>
