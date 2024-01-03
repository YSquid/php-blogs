<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed Component</title>
</head>

<body>
    <div id='feed' class='flex flex-col'>
        @foreach ($posts as $post)
            <div id="post-{{ $post->id }}" class="flex">
                <div id="post-{{ $post->id }}-left">
                    <img src={{ $post->hero_image }} alt="">
                </div>

                <div id="post-{{ $post->id }}-right">
                    <h3>{{ $post->author }}</h3>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->preview_text }}</p>
                    <a href="{{ url('/post', ['id' => $post->id]) }}">Show Post</a>
                </div>
             

            </div>
        @endforeach
    </div>
</body>

</html>
