@extends('layout.app')

@section('pages')
<div class="container">
    <div class="wrapper">
        <div class="top-wrapper">
            @yield('top-wrapper')
        </div>

        @yield('content')
    </div>
</div>

<script src="{{ asset('/js/view.js')}}"></script>
@endsection

