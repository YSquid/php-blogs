<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class='flex flex-col h-screen'>

    {{-- conditional rendering based on if the user is logged in --}}
    @auth
    <div id='top-bar' class='flex w-screen items-center'>
        <h1 class='flex-grow text-ellipsis text-center'>Hi {{ ucwords(auth()->user()->name) }}</h1>
        <form action='/logout' method="POST" class='ml-auto mr-8 mt-6'>
            @csrf
            <button>Log Out</button>
        </form>
    </div>
    
    <div id='main-content' class='flex w-screen'>
        <div>
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <textarea name="body" placeholder="Type your post here..."></textarea>
                <button>Create Post</button>
            </form>
        </div>

        <div>
            <h2>All posts</h2>
            {{-- this is similar to rendering html with JS in React using {}-syntax --}}
            @foreach ($posts as $post)
                <div class='blog-post'>
                    <h3>{{ $post['title'] }} by {{ $post->user->name }}</h3>
                    <p>{{ $post['body'] }}</p>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>
    @else
        <div id='login-page' class='h-screen flex align-middle justify-center items-center'>
            
                <div id='register' class='flex flex-col h-10 mx-10'>
                    <h2>Register</h2>
                    <form action="/register" method="POST" class='flex flex-col'>
                        {{-- this @ syntax is allowed in blade files to access utilities --}}
                        @csrf
                        <input type="text" name="name" placeholder="name" class='my-2'>
                        <input type="text" name="email" placeholder="email" class='my-2'>
                        <input type="password" name="password" id="password" placeholder="password" class='my-2'>
                        <button class='my-2'>Register</button>
                    </form>
                </div>

                <div id='login'class='flex flex-col h-10  mx-10'>
                    <h2>Login</h2>
                    <form action="/login" method="POST" class='flex flex-col'>
                        {{-- this @ syntax is allowed in blade files to access utilities --}}
                        @csrf
                        <input type="text" name="loginname" placeholder="name" class='my-2'>
                        <input type="password" name="loginpassword" placeholder="password" class='my-2'>
                        <button>Login</button class='my-2'>
                    </form>
                </div>
                
        </div>
            @endauth

</body>

</html>
