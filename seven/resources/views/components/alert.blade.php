<div>
    {{$slot}}
    @if (session('success_message'))
        <div class="alert alert-success" role="alert">
            {{ session('success_message') }}
        </div>
    @elseif (session('error_message'))
        <div class="alert alert-danger" role="alert">
            {{session('error_message')}}
        </div>
    @endif
</div>
