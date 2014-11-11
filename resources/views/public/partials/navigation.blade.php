<h1><a href="{{ URL::route('home') }}">Asguard</a> CMS</h1>
<nav id="nav">
    <ul>
        <li><a href="{{ URL::route('home') }}" class="{{ Request::is('/') ? 'active' : ''}}">Home</a></li>
        <li><a href="{{ URL::route('install') }}" class="button {{ Request::is('install') ? 'active' : ''}}">Install</a></li>
    </ul>
</nav>
