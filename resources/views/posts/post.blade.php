<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id='blog-post' class='min-h-screen flex-grow flex flex-col w-full'>
        @include('header.header')
        <div id="blog-content" class='h-full flex flex-col flex-grow items-center m-auto p-8 xs:w-full sm:w-full md:w-1/2 bg-snow'>
            <h1 class='text-center mt-14 mb-4 text-4xl'>{{ $post->title }}</h1>
            <h2 class='text-center mb-4'>Author: {{ $post->author }}</h2>
            <img src={{ $post->hero_image }} alt="blog_hero_image" class="max-w-full mx-auto mb-8">
            <p class='text-center mb-8'>{{ $post->body_1 }}</p>
            <img src={{ $post->image_2 }} alt="blog_hero_image" class="max-w-full mx-auto mb-8">
            <p class='text-center mb-8'>{{ $post->body_2 }}</p>
        </div>
    </div>
</body>

</html>
