<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            function updateSessionData(inputName, inputValue) {
                $.post('/update-session', {
                    [inputName]: inputValue,
                    '_token': '{{ csrf_token() }}'
                });
            }

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
        <h2 class="m-4">Edit Blog Post</h2>

        <div id="edit-post" class="w-1/2 bg-anti-flash-white p-8">
            <form method="POST" action="/update-post/{{ $post->id }}" class="flex flex-col">
                @csrf
                @method('PUT') <!-- Use PUT method for updating the post -->

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="form-group mb-4 flex flex-col">
                    <label for="title" class='mb-4'>Title:</label>
                    <input type="text" name="title" class="form-control" required
                    value="{{ old('title', session('post_data.title', $post->title)) }}">
                </div>

                <div class="form-group mb-4 flex flex-col">
                    <label for="author" class='mb-4'>Author:</label>
                    <input type="text" name="author" class="form-control" required
                    value="{{ old('author', session('post_data.author', $post->author)) }}">
                </div>

                <div class="form-group mb-4 flex flex-col">
                    <label for="hero_image" class='mb-4'>Hero Link (URL):</label>
                    <input type="url" name="hero_image" class="form-control w-full" required
                    value="{{ old('hero_image', session('post_data.hero_image', $post->hero_image)) }}">
                </div>

                <div class="form-group mb-4 flex flex-col">
                    <label for="image_2" class='mb-4'>Image 2 Link (URL):</label>
                    <input type="url" name="image_2" class="form-control w-full" required
                    value="{{ old('image_2', session('post_data.image_2', $post->image_2)) }}">
                </div>

                <div class="form-group mb-4 flex flex-col">
                    <label for="body_1" class='mb-4'>Body 1:</label>
                    <textarea name="body_1" class="form-control" rows="5" required>{{ old('body_1', session('post_data.body_1', $post->body_1)) }}</textarea>
                </div>

                <div class="form-group mb-4 flex flex-col">
                    <label for="body_2" class='mb-4'>Body 2:</label>
                    <textarea name="body_2" class="form-control" rows="5" required>{{ old('body_2', session('post_data.body_2', $post->body_2)) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary bg-tropical-indigo mx-auto w-1/4 text-white">Update</button>
            </form>
        </div>
    </div>

</html>
