<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class='flex flex-col h-screen'>

    <div id='main-page'>
        @include('header.header')
        {{-- passing the tags fed to the home view from controller to child component --}}
        <div id='main-content' class="flex">
            <div id='categories' class="flex class=w-1/5 p-4 justify-center items-center">   
            @include('tags.tags', ['tags' => $tags])
            </div>

            <div id='feed' class="flex w-4/5 p4">
            @include('feed.feed', ['posts' => $posts])
            </div>
        <div>

</body>

</html>
