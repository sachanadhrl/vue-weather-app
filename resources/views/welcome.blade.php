<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather App</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
<body class="bg-blue-500">
    
    <div id="app" class="flex justify-center pt-16">
        <weather-app></weather-app>
    </div>
    
</body>
</html>