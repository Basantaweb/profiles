{{-- <!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body> --}}
    @include('codes.header')
<div class="container">



    <div id="main" class="row">

            @yield('content')
    </div>

    {{-- <footer class="row">
       
    </footer> --}}

</div>
@include('codes.footer')