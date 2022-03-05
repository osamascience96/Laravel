@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @include('layouts.flash') --}}
                    <x-alert >
                        <p>Message of the Image Upload</p>
                    </x-alert>
                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
