<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{route('articles.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
        </div>
        <hr>
        <div>
            <label for="description">Description:</label>
            <textarea rows="5" cols="30" id="description" name="description"></textarea>
        </div>
        <hr>
        <div>
            <label for="content">Content:</label>
            <textarea rows="50" cols="30" id="content" name="content"></textarea>
        </div>
       
        <button type="submit">Luu Bai Viet</button>
    </form>

   
</body>

</html>