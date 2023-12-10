<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name')}}</title>
    <link rel="icon" href="/images/BroMo Logografi.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @foreach(['styles', 'scrollbar', 'arrow', 'navbar', 'sidebar', 'auth'] as $def_css)
    <link rel="stylesheet" href="/css/{{ $def_css }}.css">
    @endforeach
</head>
<body>
    <div class="wrapper d-flex align-items-stretch vh-100">
        @if(request()->path() !== 'log-in' && request()->path() !== 'sign-in')
        <x-sidebar/>
        <div class="d-flex flex-column justify-content-start w-100">
            <x-navbar/> 
            <div class="d-flex flex-column justify-content-start overflow-auto vh-100 w-100 py-3 px-5">
        @endif 
                {{$slot}}
            </div>
        </div>
    </div>
    <script src="/js/sidebar.js"></script>
    @stack('scripts')
</body>
</html>