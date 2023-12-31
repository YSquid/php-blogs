<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed Component</title>


    <script>
        function confirmDelete(postId) {
            if (confirm('Are you sure you want to delete this post?')) {
                // Trigger the corresponding form submission
                document.getElementById('deleteForm' + postId).submit();
            }
        }
    </script>
</head>

<body>
    <div id='feed' class='flex flex-col w-full'>
        @foreach ($posts as $post)
            <div id="post-{{ $post->id }}" class="flex m-4 border border-light-grey shadow-md hover:border-iris">
                <div id="post-{{ $post->id }}-left" class='m-4'>
                    <a href="{{ url('/post', ['id' => $post->id]) }}" class='mt-auto mb-2'><img
                            src={{ $post->hero_image }} alt=""></a>
                </div>

                <div id="post-{{ $post->id }}-right" class='flex flex-col m-4'>
                    <a href="{{ url('/post', ['id' => $post->id]) }}" class='mb-2'>
                        <h2 class='font-bold text-2xl hover:text-iris'>{{ $post->title }}</h2>
                    </a>
                    <h3 class="mb-8 text-onyx text-md font-medium">Author: {{ $post->author }}</h3>
                    <p class='text-md'>{{ $post->preview_text }}</p>
                    <a href="{{ url('/post', ['id' => $post->id]) }}"
                        class=' mt-auto mb-2 bg-iris text-white text-center rounded hover:bg-sea-green'>Read</a>
                    
                    {{-- ADMIN PANEL BUTTONS --}}
                    @auth
                        <div id="edit-post-{{ $post->id }}">
                            <a href="/edit-post/{{ $post->id }}" class="bg-iris text-white p-1 rounded hover:bg-sea-green">Edit Post</a>
                            
                            <form id="deleteForm{{ $post->id }}" action="/delete-post/{{ $post->id }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="#" onclick="confirmDelete('{{ $post->id }}')" class='bg-red text-white p-1 rounded hover:bg-sea-green'>Delete Post</a>
                        </div>
                    @endauth
                </div>


            </div>
        @endforeach
    </div>
</body>

</html>
