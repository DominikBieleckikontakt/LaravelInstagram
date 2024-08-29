<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
  public function index($user)
  {
    $user = User::findOrFail($user);

    return view('profiles/index', [
      'user' => $user,
    ]);
  }
}
