<?php

namespace App\Http\Controllers\API\Comment;

use App\Events\Comment\CommentEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Comment\StoreRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreRequest $request) {
        $data = $request->validated();

        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->rate = $request->get('rate');
        $comment->apartment_id = $request->get('apartment_id');
        $comment->user_id =  $request->get('user_id');

        // dd($comment);
        $comment->save();

        event(new CommentEvent($comment));

        return new CommentResource($comment);
    }
}
