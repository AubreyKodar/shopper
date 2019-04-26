<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-DNS-Prefetch-Control" content="on">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="Shopper">
    <meta name="application-name" content="Shopper">
    <meta name="theme-color" content="#ffffff">
    <link rel="dns-prefetch" href="{{ config('app.url') }}">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    @routes
    @if ( request()->route()->getName() === 'shopper.settings.mails.templates.newTemplate' ||
          request()->route()->getName() === 'shopper.settings.mails.mailables.editMailable' ||
          request()->route()->getName() === 'shopper.settings.mails.templates.viewTemplate')
        <!-- Editor Markdown/Html/Text -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.css">
    @endif
    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/shopper.css', 'shopper') }}">
</head>
<body>

    <div id="app" class="app app-aside-fixed">
        <!-- header  -->
        @include('shopper::partials.layouts.header')
        <!-- ./header  -->
        <!-- aside  -->
        @include('shopper::partials.layouts.sidebar')
        <!-- / aside  -->
        <!-- content  -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body" id="app-content-body">
                @include('shopper::components.flash')

                @yield('content')
            </div>
        </div>
        <!-- /content  -->
    </div>

    <script>
        window.default_locale = "{{ config('app.locale') }}"
        window.fallback_locale = "{{ config('app.fallback_locale') }}"
        window.messages = @json($messages)
    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    @if ( request()->route()->getName() === 'shopper.settings.mails.templates.newTemplate' ||
          request()->route()->getName() === 'shopper.settings.mails.mailables.editMailable' ||
          request()->route()->getName() === 'shopper.settings.mails.templates.viewTemplate')
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.0/tinymce.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/javascript/javascript.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/display/placeholder.js"></script>
    @endif
    <script src="{{ mix('/js/shopper.js','shopper')}}" type="text/javascript"></script>
    @stack('scripts')

</body>
</html>
