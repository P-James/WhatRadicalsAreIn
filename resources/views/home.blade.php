<!DOCTYPE html>
<html lang="en" class="font-dengxian">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character search</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/main.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>

<body class="bg-darkBlue min-h-screen text-offWhite">
    <div id="app">
        <div class="max-w-screen-md w-5/6 md:w-4/5 mx-auto my-6 md:mt-10">
            <h1 class="flex justify-center items-center h-12 md:h-16 text-lg text-2xl text-center">Chinese Character Radical Search</h1>

            @livewire('character-blocks')
        </div>
    </div>
    @livewireScripts
</body>

</html>