@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between">
    <h4 class="mt-3 badge rounded-pill text-bg-danger py-3 px-5 fw-bold text-uppercase">{{ $tag->name }}</h4>
    <h4 class="mt-3 badge rounded-pill text-bg-info py-3 px-5 fw-bold text-uppercase"><a href="{{ route('admin.tags.index') }}">Tags list</a></h4>
</div>


<h3 class="mt-5">Progetti con questo tag:</h3>
    @foreach ($tag->posts as $post)
        <br>
        <hr class="text-dark">
        <h3>{{ $post->title }}</h3>
        <img class="w-75" src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>{{ $post->url }}</p>
    @endforeach
@endsection
