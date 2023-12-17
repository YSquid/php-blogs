<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    {{-- conditional rendering based on if the user is logged in --}}
    @auth
    <div class="text-red-500">
        This is a test element with a Tailwind CSS class.
    </div>
        <h1 class='text-ellipsis text-center'>You are logged in</h1>
        <form action='/logout' method="POST">
            @csrf
            <button>Log Out</button>
        </form>

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
    @else
    <div class="bg-blue-500 text-white p-4">
        This is a test element with a Tailwind CSS class.
    </div>
        <div class='text-cen  '>
            <div id='sign-up'>
                <h2>Register</h2>
                <form action="/register" method="POST">
                    {{-- this @ syntax is allowed in blade files to access utilities --}}
                    @csrf
                    <input type="text" name="name" placeholder="name">
                    <input type="text" name="email" placeholder="email">
                    <input type="password" name="password" id="password" placeholder="password">
                    <button>Register</button>
                </form>
            </div>

            <div id='sign-in'>
                <h2>Login</h2>
                <form action="/login" method="POST">
                    {{-- this @ syntax is allowed in blade files to access utilities --}}
                    @csrf
                    <input type="text" name="loginname" placeholder="name">
                    <input type="password" name="loginpassword" placeholder="password">
                    <button>Login</button>
                </form>
            </div>
            <div>
            @endauth

</body>

</html>
