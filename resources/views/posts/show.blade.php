@extends('layouts.app')

@section('content')

<div class="container mt-5 shadow rounded">
  <div class="row">
    <div class="col-8 p-0">
      <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-75 rounded-start">
    </div>
    <div class="col-3 py-5">
      <div>
        <h3>{{ $post->user->username }}</h3>
        <p>{{ $post->caption }}</p>
      </div>
    </div>
  </div>
</div>

@endsection