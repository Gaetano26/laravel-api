@extends('layouts.admin')

@section('content')
        <div  class="d-flex justify-content-between">
             <h4 class="mt-3 badge rounded-pill text-bg-success py-3 px-5 fw-bold text-uppercase">{{ $category->name }}</h4>
            <h4 class="mt-3 badge rounded-pill text-bg-info py-3 px-5 fw-bold text-uppercase"><a href="{{ route('admin.categories.index') }}">Categories list</a></h4>

        </div>


    <h3 class="mt-5">Progetti di questa categoria:</h3>
    @foreach ($posts as $post)
        <br>
        <hr class="text-dark">
        <h4 class="text-success mt-3">{{ $post->title }}</h4>
        <img class="w-75" src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>{{ $post->url }} </p>
    @endforeach
@endsection
