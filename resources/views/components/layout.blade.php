<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Lobster&family=Luxurious+Roman&family=Luxurious+Script&family=Playball&family=Source+Serif+4&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


    
    <div class="altezzapagina">
        @if(Route::currentRouteName() == 'index' || Route::currentRouteName() == 'formads')
        <x-navbar></x-navbar>
        @else
        <x-navbardark></x-navbardark>
        @endif
        {{$slot}}
        <x-footer ></x-footer>
    </div>



    <script src="{{asset("js/app.js")}}"></script>
    <script src="https://kit.fontawesome.com/a8cc26d220.js" crossorigin="anonymous"></script>
    
</body>
</html>