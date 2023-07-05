<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Congrats, you are logged in!</p>
        <form action="/logout" method="POST">
            {{ csrf_field() }}
            <button>Log Out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a new Post</h2>
            <form action="/create-post" method="POST">
            {{ csrf_field() }}
            <input name="title" type="text" placeholder="post title">
            <textarea name="body" placeholder="body content...."></textarea>
            <button>Create new post</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}

                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    @else
    <div style="border: 3px solid black;">
        <h1>Register</h1>
        <form action="/register" method="POST">
        {{ csrf_field() }}
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h1>Login</h1>
        <form action="/login" method="POST">
        {{ csrf_field() }}
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>Log In</button>
        </form>
    </div>
    @endauth
</body>
</html>