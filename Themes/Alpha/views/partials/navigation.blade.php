<h1><a href="{{ URL::to('/') }}">Asgard</a> CMS</h1>
<nav id="nav">
    <ul>
        <li><a href="{{ URL::to('/') }}" class="{{ Request::is('/') ? 'active' : ''}}">Home</a></li>
        {{--<li><a href="{{ URL::route('install') }}" class="button {{ Request::is('install') ? 'active' : ''}}">Install</a></li>--}}
        <li><a href="{{ URL::route('faq') }}" class="{{ Request::is('faq') ? 'active' : ''}}">F.A.Q.</a></li>
        <li><a href="{{ URL::route('doc.index') }}" class="{{ Request::is('docs*') ? 'active' : ''}}">Documentation</a></li>
        <li>
            <a href="" class="icon fa-angle-down">Account</a>
            <ul>
                <?php if ($user): ?>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    <?php if ($user->hasRoleName('Admin')): ?>
                        <li><a href="{{ route('dashboard.index') }}">Admin</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</nav>
