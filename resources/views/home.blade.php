<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id='sign-up'>
        <h2>Register</h2>
        <form action="/register" method="POST">
            {{-- this @ syntax is allowed in blade files to access utilities --}}
            @csrf
            <input type="text" name="name" id="name" placeholder="name">
            <input type="text"  name="email" id="email" placeholder="email">
            <input type="password"  name="password" id="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
</body>
</html>