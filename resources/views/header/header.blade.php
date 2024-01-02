<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div id='header' class="flex  bg-slate-50 justify-between items-center p-4 bg-onyx">
        <div id='socials' class='flex ml-4 bg-red-50 justify-between h-auto w-auto space-x-4'>
            <a href="https://github.com/YSquid" target="_blank" title="GitHub"><i
                    class="fa-brands fa-github fa-2xl text-white"></i></a>
            <a href="https://www.linkedin.com/in/ahmad-kariem/" target="_blank" title="LinkedIn"><i
                    class="fa-brands fa-linkedin fa-2xl text-white"></i></a>
            <a href="https://ahmadkariem.com/" target="_blank" title="ahmadkariem.com"><i
                    class="fa-solid fa-globe fa-2xl text-white"></i></a>
        </div>
        <div id='link'>
            @auth
                <a href="/admin"><h1 class="text-white text-lg font-bold">Admin Panel</h1></a>
            @else
                <a href="/"><h1 class="text-white text-lg">Feed</h1></a>

            @endauth
        </div>
        <div id='title' class='mr-4'>
            @auth
            <a href="/admin"><h1 class="text-white text-lg font-bold">Status201</h1></a>
            @else
            <a href="/"><h1 class="text-white text-lg font-bold">Status201</h1></a>
            @endauth
        </div>
    </div>
</body>

</html>
