@extends('layouts.app')

@section('content')

<div class="container mt-5 shadow rounded">
  @foreach($posts as $post)
  <div class="row">
    <div class="col-6 offset-3">
      <a href="/profile/{{ $post->user->id }}">
        <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-75 rounded-start">
      </a>
    </div>
  </div>
  <div class="row pt-2 pb-4">
    <div class="col-6 offset-3">
      <p>
        <span class="font-weight-bold">
          <a href="/profile/{{ $post->user->id }}">
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
@endforeach
<div class="row">
  <div class="col-12 d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
</div>
</div>

@endsection