<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if (isset($setting) && $setting)
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    @endif

    @if (isset($title) && $title)
    <title>{{ $title }}</title>
    @endif
    @php
        $file_url = "";
        $site_settings = \App\SiteSettings::where('id', 1)->first();
        if(!empty($site_settings) && !empty($site_settings->uploadFileLLogo)){
            if(file_exists(public_path($site_settings->uploadFileLLogo))){
                $file_url = url($site_settings->uploadFileLLogo);
            } else {
                if(file_exists(public_path(str_replace('public/', '', $site_settings->uploadFileLLogo)))){
                    $file_url = url($site_settings->uploadFileLLogo);
                } else {
                    $file_url = asset('img/setting/icon-1730547010.png');
                }
            }
        } elseif(!empty($settings) && file_exists(public_path('public' . $settings->favicon))){
            $file_url = asset('public/' . $settings->favicon);
        } else {
            $file_url = asset('img/setting/icon-1730547010.png');
        }
    @endphp
    @if(!empty($file_url))
        <link rel="shortcut icon" type="image/x-icon" href="{{ $file_url }}" />
    @endif

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/fontawesome.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('public/js/alpine.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/sweetalert.min.js') }}"></script>
    @if (isset($setting) && $setting)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      
    </script>
    @endif
</head>

<body class="antialiased bg-body text-body font-body" dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">
    <div>
        @if (isset($nav) && $nav)
        @include('web.nav')
        @endif
        @yield('content')
    </div>

    @if (isset($footer) && $footer)
    @include('web.footer')
    @endif

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="{{ asset('public/js/smooth-scroll.polyfills.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/footer.js') }}"></script>

    @if (isset($setting) && $setting)
        
    @endif
    @stack('custom-js')
</body>

</html>
