<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    @vite('resources/css/app.css')
</head>

<body id="main-body" class='flex flex-col h-screen'>

    <div id='main-page' class="flex flex-col w-full justify-center">
        @include('header.header')
        {{-- passing the tags fed to the home view from controller to child component --}}

        <div id='feed' class="flex xs:w-full sm:w-full md:w-1/2 m-auto">
            @include('feed.feed', ['posts' => $posts])
        </div>

</body>

</html>
