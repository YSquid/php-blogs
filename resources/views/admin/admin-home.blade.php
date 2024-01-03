<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>

<body class='flex flex-col'>
    <div id='admin-panel'>
        @include('header.header')
        <div id='admin-feed' class="flex flex-col xs:w-full sm:w-full md:w-1/2 m-auto">
            <div id="create-buttons" class="text-center m-4">
                <button class='bg-iris text-white p-1 hover:bg-sea-green'>
                    <a href="/create-post" class="btn"><i class="fa-solid fa-plus m-1"></i>Create Post</a>
                </button>
                <button class='bg-iris text-white p-1 hover:bg-sea-green'>
                    <a href="/create-tag" class="btn"><i class="fa-solid fa-plus m-1"></i>Create Tag</a>
                </button>
            </div>
            @include('feed.feed', ['posts' => $posts])
        </div>
        <div>
</body>

</html>
