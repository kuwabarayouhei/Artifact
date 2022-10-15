<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>盗難車対策掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>盗難車対策掲示板</h1>
         <a href='/theft_cars/create'>新規作成</a>
        <div class='theft_cars'>
            @foreach ($theft_cars as $theft_car)
                <div class='theft_car'>
                    <h2 class='title'>
                    <a href="/theft_cars/{{ $theft_car->id }}">{{ $theft_car->title }}</a>
                    </h2>
                    <h3>車種</h3>
                    <p class='model'>{{ $theft_car->model }}</p>
                    <h3>ナンバープレート</h3>
                    <p class='number'>{{ $theft_car->number }}</p>
                    <h3>色</h3>
                    <p class='color'>{{ $theft_car->color }}</p>
                    <h3>盗難された場所</h3>
                    <p class='location'>{{ $theft_car->location }}</p>
                    <h3>盗難された時間</h3>
                    <p class='time'>{{ $theft_car->time }}</p>
                    <h3>盗難時の状況</h3>
                    <p class='situation'>{{ $theft_car->situation }}</p>
                    <h3>その他の情報</h3>
                    <p class='information'>{{ $theft_car->information }}</
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $theft_cars->links() }}
        </div>
    </body>
</html>