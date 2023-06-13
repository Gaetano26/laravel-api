@extends('layouts.admin')

@section('content')
    <h1>Index Post</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea nuovo progetto</a>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">url</th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td><img class="img-thumbnail" style="width:100px" src="{{ $post->image }}" alt="{{ $post->title }}">
                    </td>
                    <td>
                        {{ $post->url }}
                    </td>
                    <td>
                        {{ $post->category ? $post->category->name : 'Senza categoria' }}
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td class="d-flex py-4 ps-3 gap-2"><a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-primary text-white"><i class="fa-solid fa-eye"></i></a>
                        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="delete-button btn btn-success" data-item-title="{{ $post->title }}"> <i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links('vendor.pagination.bootstrap-5') }}
    @include('partials.modal-delete')
@endsection
