<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>盗難車対策掲示板</title>
    </head>
    <body>
        <h1>盗難車対策掲示板</h1>
        <form action="/theft_cars" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="theft_car[title]" placeholder="タイトル" value="{{ old('theft_car.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.title') }}</p>
            </div>
            <div class="model">
                <h2>車種、型式</h2>
                <textarea name="theft_car[model]" placeholder="TOYOTA86、zn6" value="{{ old('theft_car.model') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.model') }}</p>
            </div>
            <div class="number">
                <h2>ナンバープレート</h2>
                <textarea name="theft_car[number]" placeholder="東京　000 わ 00-00" value="{{ old('theft_car.number') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.number') }}</p>
            </div>
            <div class="color">
                <h2>色</h2>
                <textarea name="theft_car[color]" placeholder="赤" value="{{ old('theft_car.color') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.color') }}</p>
            </div>
            <div class="location">
                <h2>盗難された場所</h2>
                <textarea name="theft_car[location]" placeholder="〇〇県〇〇市" value="{{ old('theft_car.location') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.location') }}</p>
            </div>
            <div class="time">
                <h2>盗難された時刻</h2>
                <textarea name="theft_car[time]" placeholder="20xx年xx月xx日午前/午後xx時xx分頃" value="{{ old('theft_car.time') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.time') }}</p>
            </div>
            <div class="situation">
                <h2>盗難時の状況</h2>
                <textarea name="theft_car[situation]" placeholder="盗難者の情報など" value="{{ old('theft_car.situation') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.situation') }}</p>
            </div>
            <div class="information">
                <h2>その他の情報</h2>
                <textarea name="theft_car[information]" placeholder="捜索時の目印となるもの" value="{{ old('theft_car.information') }}"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('theft_car.information') }}</p>
            </div>

            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>