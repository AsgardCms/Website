<ul class="side-menu">
    <li class="header">
        <i class="fa fa-list"></i>
        Categories
    </li>
    <li class="{{ Request::is('*/getting-started/installation') ? 'active' : ''}}">
        <a href="{{ url('docs/getting-started/installation') }}">Installation</a>
    </li>
</ul>
