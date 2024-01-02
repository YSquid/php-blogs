<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id='feed'>
        @foreach ($posts as $post)
         <div>
            <img src={{ $post->hero_image }} alt="">
            <h3>{{ $post->author }}</h3>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->preview_text }}</p>

         </div>
         @endforeach
    </div>
</body>
</html>