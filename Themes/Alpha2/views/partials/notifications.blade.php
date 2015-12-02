@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        {{ Session::get('flash_notification.message') }}
    </div>
@endif
