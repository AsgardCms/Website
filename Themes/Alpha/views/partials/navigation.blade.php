<h1><a href="{{ URL::to('/') }}">Asgard</a> CMS</h1>
<nav id="nav">
    <ul>
        <li><a href="{{ URL::to('/') }}" class="{{ Request::is('/') ? 'active' : ''}}">Home</a></li>
        {{--<li><a href="{{ URL::route('install') }}" class="button {{ Request::is('install') ? 'active' : ''}}">Install</a></li>--}}
        <li><a href="{{ URL::route('faq') }}" class="{{ Request::is('faq') ? 'active' : ''}}">F.A.Q.</a></li>
        <li><a href="{{ URL::route('doc.index') }}" class="{{ Request::is('docs*') ? 'active' : ''}}">Documentation</a></li>
    </ul>
</nav>
