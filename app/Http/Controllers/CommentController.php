<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
//use App\Post;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/theft_cars/' . $input['theft_car_id']);
    }
}