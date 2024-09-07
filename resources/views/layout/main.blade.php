@include('layout.header')
@include('layout.sidebar')
{{-- <div class="content-wrapper"> --}}
@yield('content')
{{-- </div> --}}
@include('layout.footer')