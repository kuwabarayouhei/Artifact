<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='theft_cars'>
            @foreach ($theft_cars as $theft_car)
                <div class='theft_car'>
                    <h2 class='title'>{{ $theft_car->title }}</h2>
                    <p class='model'>{{ $theft_car->model }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $theft_cars->links() }}
        </div>
    </body>
</html>