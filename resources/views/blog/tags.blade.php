<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['slug'] }}</title>
</head>
<body>
    <h2>Tag:{{ $data['slug'] }}</h2>
    <ul>
        @foreach ($data['posts'] as $post)
        <li>
            <a href="{{ route('post', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
        </li>

        @endforeach
    </ul>
</body>
</html>
