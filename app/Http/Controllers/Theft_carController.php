<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Storage;
use App\Theft_car;
use App\Theft_carImage;
use Abraham\TwitterOAuth\TwitterOAuth;

class Theft_carController extends Controller
{
    public function index(Theft_car $theft_car)
    {   
        //$theft_car=$theft_car->getPaginateByLimit();
        $theft_car_image = $theft_car::with('images');  // リレーション先を引っ張る
        return view('theft_cars/index')->with(['theft_cars'=>$theft_car_image->orderBy('updated_at', 'DESC')->paginate(5)]); 
        
        //return view('theft_cars/index')->with(['theft_cars' => $theft_car->getPaginateByLimit()]);  
    }

    public function show(Theft_car $theft_car)
    {   
        return view('theft_cars/show')->with(['theft_car' => $theft_car]);
    }
    
    public function create()
    {
        return view('theft_cars/create');
    }
    
    public function store(Theft_car $theft_car, PostRequest $request)
    {
        
        $input = $request['theft_car'];
        $theft_car->fill($input)->save();
        
        
        
        foreach ($request->file('files') as $index=>$file) {
        $path = Storage::disk('s3')->putFile('myprefix', $file['image'], 'public');
        $theft_car->images()->create(['path' => Storage::disk('s3')->url($path)]);
        }
        
        $theft_car_image = $theft_car->images()->get();
        $twitter_image_path = $theft_car_image[0]->path;
        
        $connection = new TwitterOAuth(
            config('services.twitter.consumer_key'),
            config('services.twitter.consumer_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_secret'),
        );
           
           
        // 環境変数から投稿するユーザ名を取得
        $username = config('services.twitter.username');
        
        // twitterにs3の画像を投稿するため，htmlを作成(twittercard)
        // htmlファイルを作成
        $htmlfile = 'tmp.html';
        // htmlファイルの中身を作成
        $filecontents = 
        '
        <!DOCTYPE html>
        <html prefix="og: http://ogp.me/ns#">
            <head>
                <meta name="twitter:title" content="New tweets" />
                <meta name="twitter:description" content="' . '" />
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:site" content="' . $username . '" />
                <meta name="twitter:creator" content="' . $username . '">
                <meta name="twitter:image" content="' . $twitter_image_path . '" />
            </head>
            <body>
                <h1>Page Not Display</h1>
            </body>
        </html>
        ';
        // htmlファイルにhtmlの中身を記述
        file_put_contents($htmlfile, $filecontents);
        
        // 上記で作成したhtmlファイルをs3にアップロードして，pathを取得
        // htmlをバケットの'myprefix'フォルダへアップロード
        $html_tmp_path = Storage::disk('s3')->putFile('myprefix', $htmlfile, 'public');
        // アップロードした画像のフルパスを取得
        $html_path = Storage::disk('s3')->url($html_tmp_path);
        // htmlファイルの中身を空にする
        file_put_contents($htmlfile, '');
        
        // tweetの中身をフォーマットを作成
        // statusには投稿する中身を載せる．
        $tweet = [
            'status' =>
            'タイトル「' . $theft_car->title . '」' . PHP_EOL . 
                '車種「' . $theft_car->model . '」' . PHP_EOL .
                '時刻「' . $theft_car->time . '」' . PHP_EOL . 
                '場所「' . $theft_car->location . '」' . PHP_EOL .
                '#盗難車 #拡散希望' . PHP_EOL .
                 $html_path 
    
        ];
        // tweetする
        $res = $connection->post('statuses/update', $tweet);
                
        return redirect('/theft_cars/' . $theft_car->id);
    }
    
    public function delete(Theft_car $theft_car)
    {
        $theft_car->delete();
        return redirect('/');
    }
    
}
?>