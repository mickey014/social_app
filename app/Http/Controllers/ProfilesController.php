<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfilesController extends Controller
{
    
    public function index(User $user) {
        return view('profiles.index',compact('user'));
    }

    public function edit(User $user) {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user) {
   
       $data = request()->validate([
            'title' => 'required',
            'url' => 'url',
            'description' => 'required',
            'image' => ''
        ]);

        if(request('image')) {
            $manager = new ImageManager(new Driver());

            $image_path = request('image')->store('uploads','public');
    
            $image = $manager->read("storage/{$image_path}");
            // Image Crop
            $image->resize(1000,1000);
            $image->save(public_path("storage/{$image_path}"));

            $imageArr = ['image' => $image_path];
        }
       
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArr ?? []
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
