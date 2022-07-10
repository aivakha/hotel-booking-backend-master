<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function store(StoreRequest $request) {
        $data = $request->validated();

        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->rate = $request->get('rate');
        $comment->apartment_id = $request->get('apartment_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

       echo 'ok';
   }
}
