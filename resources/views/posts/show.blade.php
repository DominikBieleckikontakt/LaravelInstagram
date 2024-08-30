@extends('layouts.app')

@section('content')

<div class="container mt-5 shadow rounded">
  <div class="row">
    <div class="col-8 p-0">
      <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-75 rounded-start">
    </div>
    <div class="col-3 py-5">
      <div>
        <div class="d-flex align-items-center">
          <div class="pe-3">
            <img src="{{ $post->user->profile->image->profileImage() }}" alt="avatar" class="w-100 rounded-circle" style="max-width: 40px;">
          </div>
          <div>
            <div class="font-weight-bold">
              <a href="/profile/{{ $post->user->id }}">
                <span class="text-dark">
                  {{ $post->user->username }}
                </span>
              </a>
              <a href="#" class="ps-3">Follow</a>
            </div>
          </div>
        </div>

        <hr>
        <p>
          <span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}">
              <a>
                <span class="text-dark">
                  {{ $post->user->username }}
                </span>
              </a>
          </span>
          {{ $post->caption }}
        </p>
      </div>
    </div>
  </div>
</div>

@endsection