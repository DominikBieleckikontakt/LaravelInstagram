@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 p-5">
      <img src="{{ $user->profile->profileImage() }}" alt="avatar" class="rounded-circle w-75 mx-5">
    </div>
    <div class="col-9 pt-5">
      <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-3">
          <div class="h4">{{ $user->username }}</div>
          <follow-button user-id="{{ $user->id }}"></follow-button>
        </div>
        @can('update', $user->profile)
        <a href="/p/create">Add New Post</a>
        @endcan

      </div>
      @can('update', $user->profile)
      <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
      @endcan
      <div class="d-flex gap-5">
        <div>
          <strong>{{ $user->posts->count() }}</strong>
          posts
        </div>
        <div>
          <strong>250k</strong>
          followers
        </div>
        <div>
          <strong>212</strong>
          following
        </div>
      </div>
      <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
      <p>{{ $user->profile->description }}</p>
      <div>
        <a href="#">{{ $user->profile->url }}</a>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
      <a href="/p/{{ $post->id }}">
        <img src="/storage/{{ $post->image }}" alt="photo" class="w-100 px-3">
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection