@extends('layouts.admin')

@section('content')
    <div >
            <div class="d-flex justify-content-between">
                 <h1 class="mt-5 fw-bold">{{ $post->title }}</h1>
                 <div class="d-flex gap-3 mr-5">
                    <div>
                         <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i></a>
                    </div>

                   <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="delete-button btn btn-success" data-item-title="{{ $post->title }}"> <i
                                    class="fa-solid fa-trash"></i></button>
                  </form>
                 </div>
             </div>


            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <img class="w-75" src="{{ $post->image }}" alt="{{ $post->title }}">
            <div class="d-flex align-items-center gap-2">
                <h6 class="mt-3">Category:</h6>
                <span class="mt-2"> {{ $post->category ? $post->category->name : 'Senza categoria' }}</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <h6 class="mt-3">Url:</h6>
                <span class="mt-2"> {{ $post->url }}</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <h6 class="mt-3">Descrizione:</h6>
                <p class="mt-4">{!! $post->body !!}</p>
            </div>
            @if ($post->tags && count($post->tags) > 0)
                <div class="d-flex align-items-center gap-2 my-2">
                    <h6 class="mt-3">Tags:</h6>
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('admin.tags.show', $tag->slug) }}"
                            class="badge rounded-pill text-bg-primary py-2 px-2 mt-2">{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif
    </div>
    @include('partials.modal-delete')
@endsection
