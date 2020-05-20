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
        $(function () {
            // fade out alert after 5sec
            @if (session('alert.title'))
                setTimeout(function() {
                    $(".alert.in.show").fadeTo(2000, 0).slideUp(500, function(){
                        $(this).removeClass('in').removeClass('show').addClass('hide');
                    });
                }, 5000);
            @endif
        })
    </script>
@endsection
