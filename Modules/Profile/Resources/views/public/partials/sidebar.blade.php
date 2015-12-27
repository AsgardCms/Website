<ul class="side-menu">
    <li class="{{ on_route('user.account') ? 'active' : '' }}">
        <i class="fa fa-user"></i>
        <a href="{{ route('user.account') }}">Account</a>
    </li>
    <li class="{{ Request::is('*/account/modules*') ? 'active' : '' }}">
        <i class="fa fa-cubes"></i>
        <a href="{{ route('account.modules.index') }}">Modules</a>
    </li>
</ul>
