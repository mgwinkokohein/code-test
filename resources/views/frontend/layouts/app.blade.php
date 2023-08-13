<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="keyword" content="@yield('meta_keyword', appName().','.config('app.meta_keywords'))">
    <meta name="description" content="@yield('meta_description', config('app.meta_description'))">
    <meta name="author" content="@yield('meta_author', 'code test')">
    @yield('meta')

    @stack('before-styles')
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
    <style type="text/css">
        .navbar,.footer-bottom {
            background-color: #0c2f55!important;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #fff;
            font-size: 1rem;
            margin: 2px;
        }
        .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
            color: #555;
            background-color:#f5f8fa;
            border:1px solid #ddd;
            border-bottom-color:transparent;
            cursor:default;
            border-radius: 5px;
        }
        .navbar-light .navbar-nav .nav-link:hover,.navbar-light .navbar-nav .nav-link:focus{
            color:#555;
            background-color:#f5f8fa;
            /*border:1px solid #ddd;*/
            border-bottom-color:transparent;
            cursor:default;
            border-radius: 5px;
        }
        a:hover{color:#216a94;text-decoration:underline}
        .navbar-light .navbar-brand, .navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
            color: #fff;
        }
        .copyright ,.design{
            color: #fff;
        }
    </style>
</head>
<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    {{--@include('includes.partials.announcements')--}}

    <div id="app">
        @include('frontend.includes.nav')
        {{--@include('includes.partials.messages')--}}

        <main>
            <div class="container" style="min-height: 820px; margin-top: 10px;">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->    
        @include('frontend.includes.footer')
            
        </main>        
    </div><!--app-->

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
</html>
