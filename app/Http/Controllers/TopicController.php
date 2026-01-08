<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('topics.create');
    }

    public function dashboard()
    {
        $topics = Topic::with(['user', 'comments'])->latest()->get();
        $topicsCount = $topics->count();
        return view('dashboard', compact('topics', 'topicsCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/temas'), $imageName);
            $imagePath = 'img/temas/' . $imageName;
        }

        Topic::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Tema creado exitosamente');
    }

    public function show(Topic $topic)
    {
        $topic->load(['user', 'comments.user']);
        return view('topics.show', compact('topic'));
    }
}
