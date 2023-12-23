<!-- resources/views/posts/search.blade.php -->

@foreach ($posts as $post)
    <div>{{ $post->name }}</div>
@endforeach
