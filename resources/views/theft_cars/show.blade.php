<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>盗難車対策掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <form action="/theft_cars/{{ $theft_car->id }}" id="form_{{ $theft_car->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除する</button> 
        </form>
        <h1 class="title">
            {{ $theft_car->title }}
        </h1>
        <div class="content">
            <div class="content__theft_car">
                <h3>車種</h3>
                <p>{{ $theft_car->model }}</p>
                <h3>ナンバープレート</h3>
                <p>{{ $theft_car->number }}</p>
                <h3>色</h3>
                <p>{{ $theft_car->color }}</p>
                <h3>盗難された場所</h3>
                <p>{{ $theft_car->location }}</p>  
                <h3>盗難された時間</h3>
                <p>{{ $theft_car->time }}</p>
                <h3>盗難時の状況</h3>
                <p>{{ $theft_car->situation }}</p>
                <h3>その他の情報</h3>
                <p>{{ $theft_car->information }}</p>  
            </div>
        </div>
        @foreach ($theft_car->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">内容：{{ $comment->body }}</h5>
            </div>
            @endforeach
        <form action="/theft_cars/{theft_car}" method="POST">
            @csrf
            <div class="comment">
                <h2>リプライ</h2>
                <input type="hidden" name="comment[theft_car_id]" value="{{$theft_car->id}}">
                <input type="text" name="comment[body]" placeholder="返信内容" value="{{ old('comment.body') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            </div>
            <input type="submit" value="返信する"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>