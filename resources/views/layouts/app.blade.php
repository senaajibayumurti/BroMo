<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name')}}</title>
    @stack('styles')
</head>
<body>
    @include('components.sidebar')
    @include('components.navbar')
    {{$slot}}
</body>
</html>