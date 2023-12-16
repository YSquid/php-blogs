<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    {{-- conditional rendering based on if the user is logged in --}}
    @auth
    <h1>You are logged in</h1>

    <form action='/logout' method="POST">   
        @csrf
        <button>Log Out</button>
    </form>
    @else
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
    @endauth

</body>

</html>
