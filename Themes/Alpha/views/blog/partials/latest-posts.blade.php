<ul class="side-menu">
    <?php if ($latestPosts->count() > 0): ?>
        <li class="header">
            Latest posts
        </li>
        <?php foreach($latestPosts as $post): ?>
        <li><a href="{{ route(locale() . '.blog.slug', [$post->slug]) }}">{{ $post->title}}</a></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
