<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character search</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/main.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>

<body class="bg-gray-300">
    <div id="app">
        @livewire('character-blocks')
    </div>
    @livewireScripts
</body>

</html>