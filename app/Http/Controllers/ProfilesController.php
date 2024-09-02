<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfilesController extends Controller
{
  public function index(\App\Models\User $user)
  {
    $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
    return view('profiles/index', compact('user', 'follows'));
  }

  public function edit(\App\Models\User $user)
  {
    $this->authorize('update', $user->profile);

    return view('profiles/edit', compact('user'));
  }

  public function update(\App\Models\User $user)
  {
    // $this->authorize('update', $user->profile);

    $data = request()->validate([
      'title' => 'required',
      'description' => 'required',
      'url' => 'url',
      'image' => ''
    ]);

    if (request('image')) {
      $imagePath = request('image')->store('profile', 'public');

      $manager = new ImageManager(new Driver());

      $image = $manager->read("storage/{$imagePath}");
      $image->cover(800, 800, 'center');
      $image->save();

      $imageArray = ['image' => $imagePath];
    }



    auth()->user()->profile->update(array_merge(
      $data,
      $imageArray ?? []
    ));

    return redirect('/profile/{$user->id}');
  }
}
