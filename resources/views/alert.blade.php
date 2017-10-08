@if (session('alert.title'))
    <div class="alert alert-{{ session('alert.level') }} fade in">
        @if (session('alert.close'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        @endif
        @if (session('alert.icon'))
            <i class="fa-fw fa fa-{{ session('alert.icon') }}"></i>
        @endif
        <strong>{{ session('alert.title') }}</strong>
        {!! session('alert.content') !!}
    </div>
@endif