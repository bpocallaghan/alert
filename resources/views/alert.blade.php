@if (session('alert.title'))
    <div class="alert alert-{{ session('alert.level') }} fade in show">
        @if (session('alert.close'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        @endif

        @if (session('alert.icon'))
            <i class="{{ session('alert.icon') }}"></i>
        @endif

        <strong>{{ session('alert.title') }}</strong>

        {!! session('alert.content') !!}
    </div>
@endif

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function() {
            @if (session('alert.title') && session('alert.timeout') && session('alert.timeout') > 0)
                setTimeout(function() {
                    $(".alert.in.show").fadeTo(2000, 0).slideUp(500, function() {
                        $(this).removeClass('in').removeClass('show').addClass('hide');
                    });
                }, {{ session('alert.timeout') }});
            @endif
        })
    </script>
@endsection
