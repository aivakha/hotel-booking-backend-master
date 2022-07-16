<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user->hasRole('super_user')) {
            $comments = Comment::all();
        } elseif ($user->hasRole('advance_user')) {
            $comments = Comment::whereHas('apartment', function(Builder $query) {
                $query->whereIn('user_id', [Auth::user()->id]);
            })->get();
        } else {
            $comments = Comment::whereIn('user_id', [Auth::user()->id])->get();
        }

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
