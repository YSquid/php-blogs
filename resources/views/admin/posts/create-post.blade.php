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
         $(document).ready(function () {
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
        $(document).on('input', 'input, textarea', function () {
            let inputName = $(this).attr('name');
            let inputValue = $(this).val();
            updateSessionData(inputName, inputValue);
        });
    });
    </script>
    
</head>

<body>
    @if (session('post_data'))
        <div class="alert alert-info">
            Your previous form data is stored. Feel free to modify it.
        </div>
    @endif

    <div class="container">
        <h2>Create a Blog Post</h2>

        <form method="POST" action="/create-post">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title', session('post_data.title')) }}">
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" class="form-control" required value="{{ old('author', session('post_data.author')) }}">
            </div>

            <div class="form-group">
                <label for="hero_image">Hero Link (URL):</label>
                <input type="url" name="hero_image" class="form-control" required value="{{ old('hero_image', session('post_data.hero_image')) }}">
            </div>

            <div class="form-group">
                <label for="image_2">Image 2 Link (URL):</label>
                <input type="url" name="image_2" class="form-control" required value="{{ old('image_2', session('post_data.image_2')) }}">
            </div>

            <div class="form-group">
                <label for="body_1">Body 1:</label>
                <textarea name="body_1" class="form-control" rows="5" required>{{ old('body_1', session('post_data.body_1')) }}</textarea>
            </div>

            <div class="form-group">
                <label for="body_2">Body 2:</label>
                <textarea name="body_2" class="form-control" rows="5" required>{{ old('body_2', session('post_data.body_2')) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
