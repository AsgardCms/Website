<h1><a href="{{ URL::to('/') }}">Asgard</a> CMS</h1>
<nav id="nav">
    <ul>
        <li class="{{ on_route('homepage') ? 'active' : ''}}"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="{{ Request::is('*features') ? 'active' : ''}}"><a href="{{ route('page', ['features']) }}">Features</a></li>
        <li class="{{ Request::is('*install') ? 'active' : ''}}"><a href="{{ route('page', ['install']) }}" class="button">Install</a></li>
        <li class="{{ Request::is('*docs*') ? 'active' : ''}}"><a href="{{ route('doc.index') }}">Documentation</a></li>
        <li class="{{ Request::is('*blog/*') ? 'active' : ''}}"><a href="{{ route(locale() . '.blog') }}">Blog</a></li>
        <li class="{{ on_route('faq') ? 'active' : ''}}"><a href="{{ route('faq') }}">F.A.Q.</a></li>
        <?php if ($user): ?>
        <li class="{{ Request::is('*auth/*') ? 'active' : ''}}">
            <a href="" class="icon fa-angle-down">Account</a>
            <ul>
                <?php if ($user): ?>
                    <li class="{{ on_route('user.account') || on_route('user.beta') ? 'active' : '' }}">
                        <a href="{{ route('user.account') }}">Account</a>
                        <ul>
                            <li class="{{ on_route('user.account') ? 'active' : '' }}"><a href="{{ route('user.account') }}">Account</a></li>
                            <li class="{{ on_route('user.beta') ? 'active' : '' }}"><a href="{{ route('user.beta') }}">Beta status</a></li>
                        </ul>
                    </li>
                    <?php if ($user->hasRoleName('Admin')): ?>
                        <li><a href="{{ route('dashboard.index') }}">Admin</a></li>
                    <?php endif; ?>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                <?php else: ?>
                    <li class="{{ Request::is('*auth/login') ? 'active' : ''}}"><a href="{{ route('login') }}">Login</a></li>
                    <li class="{{ Request::is('*auth/register') ? 'active' : ''}}"><a href="{{ route('register') }}">Register</a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php else: ?>
            <li class="{{ Request::is('*auth/login') ? 'active' : ''}}"><a href="{{ route('login') }}" class="button">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
