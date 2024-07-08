<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post as Post_model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $manager = new ImageManager(new Driver());

        $image_path = request('image')->store('uploads','public');

        $image = $manager->read("storage/{$image_path}");
        // Image Crop
        $image->resize(1200,1200);
        $image->save(public_path("storage/{$image_path}"));
        // $image = Image::read(public_path("storage/{$image_path}"))->fit(1200,1200);
        // $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $image_path,
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(Post_model $post) {
        return view('posts.show',compact('post'));
    }
}
