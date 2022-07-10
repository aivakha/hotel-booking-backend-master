<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function update($id) {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back()->with('success', 'Коментар успішно оновлений!');
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Коментар успішно видалений!');
    }
}
