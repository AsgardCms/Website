<ul class="side-menu">
    <li class="header">
        <i class="fa fa-home"></i>
        Getting Started
    </li>
    <li class="{{ Request::is('*/getting-started/installation') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['getting-started/installation']) }}">Installation</a>
    </li>
    <li class="header">
        <i class="fa fa-bolt"></i>
        Core Module
    </li>
    <li class="{{ Request::is('*/core-module/configuration') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['core-module/configuration']) }}">Configuration</a>
    </li>
    <li class="{{ Request::is('*/core-module/navigation') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['core-module/navigation']) }}">Navigation</a>
    </li>
    <li class="{{ Request::is('*/core-module/permissions') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['core-module/permissions']) }}">Permissions</a>
    </li>
    <li class="{{ Request::is('*/core-module/repositories') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['core-module/repositories']) }}">Repositories</a>
    </li>
    <li class="header">
        <i class="fa fa-file-image-o"></i>
        Media Module
    </li>
    <li class="{{ Request::is('*/media-module/thumbnails') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['media-module/thumbnails']) }}">Thumbnails</a>
    </li>
    <li class="{{ Request::is('*/media-module/getting-a-thumbnail') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['media-module/getting-a-thumbnail']) }}">Getting a thumbnail</a>
    </li>
    <li class="{{ Request::is('*/media-module/refreshing-thumbnails') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['media-module/refreshing-thumbnails']) }}">Refreshing thumbnails</a>
    </li>
    <li class="header">
        <i class="fa fa-cogs"></i>
        Setting Module
    </li>
    <li class="{{ Request::is('*/setting-module/adding-settings') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['setting-module/adding-settings']) }}">Adding settings</a>
    </li>
    <li class="{{ Request::is('*/setting-module/available-fields') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['setting-module/available-fields']) }}">Available fields</a>
    </li>
    <li class="{{ Request::is('*/setting-module/custom-fields') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['setting-module/custom-fields']) }}">Custom fields</a>
    </li>
    <li class="{{ Request::is('*/setting-module/reading-settings') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['setting-module/reading-settings']) }}">Reading settings</a>
    </li>
    <li class="header">
        <i class="fa fa-picture-o"></i>
        Themes
    </li>
    <li class="{{ Request::is('*/themes/usage') ? 'active' : ''}}">
        <a href="{{ route('doc.show', ['themes/usage']) }}">Usage</a>
    </li>
</ul>
