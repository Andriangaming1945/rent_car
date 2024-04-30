<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
   
    
    public function index(){
        return view('admin.admin');
    }

    public function create(): View{
        $kd_mobil_placeholder = Post::pluck('kd_mobil')->first();

        return view("posts.create", compact('kd_mobil_placeholder'));
    }

    public function store(Request $request): RedirectResponse{
        $request->validate( [
            "merk" => "required|min:5",
            "warna" => "required|min:5",
            "harga" => "required|min:5",
            "kd_mobil" => 'required|min:5',
            "images" => "required|image|mimes:jpg,png,jpeg|max:2048"

        ]);

        //upload image
        $images = $request->file('images');
        $images->storeAs('public/posts', $images->hashName());

        //create post
        Post::create([
            "images" => $images->hashName(),
            "merk" => $request->merk,
            "harga" => $request->harga,
            "warna" => $request->warna,
            "kd_mobil" => $request->kd_mobil

        ]);

        

        return redirect()->route('admin')->with(['success' => "Berhasil memasukkan"]);
    }

    public function show(string $id): View{
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    

    public function edit(string $id): View{
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse{
        $request->validate( [
            "merk" => "required|min:5",
            "warna" => "required|min:5",
            "harga" => "required|min:5",
            "kd_mobil" => 'required|min:5',
            "images" => "image|mimes:jpg,png,jpeg|max:2048"
    
        ]);
    
        //get post by id
        $post = Post::findOrFail($id);
    
        //check image upload
        // Check if an image is uploaded
if ($request->hasFile('images')) {
    // Upload new image
    $images = $request->file('images');
    $images->storeAs('public/posts', $images->hashName());

    // Delete old image
    Storage::delete('public/posts/' . $post->images);

    // Update post with new image
    $post->update([
        "images" => $images->hashName(),
        "merk" => $request->merk,
        "harga" => $request->harga,
        "warna" => $request->warna,
        "kd_mobil" => $request->kd_mobil,
    ]);
} else {
    // Update post without changing the image
    $post->update([
        "merk" => $request->merk,
        "harga" => $request->harga,
        "warna" => $request->warna,
        "kd_mobil" => $request->kd_mobil,
    ]);
}

        return redirect()->route('admin')->with(['success' => "Berhasil memperbarui post"]);
    
    }
    
    public function destroy($id): RedirectResponse{
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'.$post->images);

        //delete post
        $post->delete();

        return redirect()->route('admin')->with(['success' => "Berhasil memperbarui delete post"]);

    }
}
