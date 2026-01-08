<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'topic_id' => 'required|exists:topics,id',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'topic_id' => $request->topic_id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comentario publicado exitosamente');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return back()->with('error', 'No tienes permiso para eliminar este comentario');
        }

        $comment->delete();
        return back()->with('success', 'Comentario eliminado');
    }
}
