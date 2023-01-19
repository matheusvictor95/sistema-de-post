<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categoria = Categoria::all();

        return view('admin.posts.create',compact('categoria'));
    }

    public function store(StoreUpdatePost $request)
    {
        
        $data = $request->all();
        if ($request->image && $request->image->isValid()) {
            $namefile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientORiginalExtension();
            $image = $request->image->storeAs('posts', $namefile);
            $data['image'] = $image;
        }

        Post::create($data);
        return redirect()->route('posts.index')->with('message', 'Post Criado com sucesso');;
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {

        if (!$post = Post::find($id))
            return redirect()->route('posts.index');

        if (Storage::exists($post->image))
            Storage::delete($post->image);

        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deletado com sucesso');
    }

    public function edit($id)
    {
        if (!$post = Post::findorfail($id)) {
            return redirect()->back();
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::findorfail($id)) {
            return redirect()->back();
        }


        $data = $request->all();
        if ($request->image->isValid()) {
            if (Storage::exists($post->image))
                Storage::delete($post->image);

            $namefile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientORiginalExtension();

            $image = $request->image->storeAs('posts', $namefile);
            $data['image'] = $image;
        }

        $post->update($data);
        return redirect()->route('posts.index')->with('message', 'Post Editado com sucesso');
        //return view('admin.posts.', compact('post'));
    }

    public function search(Request $request)
    {
        
        $filters = $request->except('_token');
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")->orWhere('content', 'LIKE', "%{$request->search}%")->paginate(5);

        return view('admin.posts.index', compact('posts', 'filters'));
    }
}
