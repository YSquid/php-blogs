<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        //execute once DOM is loaded
        $(document).ready(function() {
            //intialize post request to server at /update-session
            //construct object to send in post request with dynamic property - property name is value is inputName param, value is the inputValue param
            //send token with post
            function updateSessionData(inputName, inputValue) {
                $.post('/update-session', {
                    [inputName]: inputValue,
                    '_token': '{{ csrf_token() }}'
                });
            }

            //attach an input event listenser to all input and text area fields
            //this will refer to the element this listener is attached to
            //call the updateSession Data function with the inputName and inputValue
            $(document).on('input', 'input, textarea', function() {
                let inputName = $(this).attr('name');
                let inputValue = $(this).val();
                updateSessionData(inputName, inputValue);
            });
        });
    </script>

</head>

<body>
    <div class="flex flex-col justify-start items-center h-full bg-snow w-1607">
        <h2 class="m-4">Add a Tag</h2>

        <div id="create-tag" class="w-1/2 bg-anti-flash-white p-8">
            <form method="POST" action="/create-tag" class="flex flex-col">
                @csrf

                <div class="form-group mb-4 flex flex-col">
                    <label for="name" class='mb-4'>Tag Name:</label>
                    <input type="text" name="name" class="form-control" required
                        value="{{ old('name', session('tag_data.name')) }}">
                </div>

                <button type="submit" class="btn btn-primary bg-tropical-indigo mx-auto w-1/4 text-white">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
