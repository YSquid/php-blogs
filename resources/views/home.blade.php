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
    @include('tags.tags', ['tags' => $tags]) 
    @include('feed.feed', ['posts' => $posts])
   </div>

</body>

</html>
