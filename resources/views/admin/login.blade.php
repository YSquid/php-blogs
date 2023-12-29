<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex items-center justify-center min-h-screen">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/login">
            @csrf
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="username" type="text" name="username">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password" type="password" name="password">

            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Login
            </button>
        </form>
    </div>


    {{-- <div>
        <form method='POST' action='/register'>
            @csrf
            <label for="username">Username</label>
            <input type="text" name="name" id="name">
            
            <label for="username">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
       
            <button type="submit">
                Register
            </button>
        </form>
    </div> --}}

</body>

</html>
