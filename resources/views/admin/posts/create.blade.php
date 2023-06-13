@extends('layouts.admin')

@section('content')
    <h1>Create Project</h1>
    <form class="row flex-column" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                required maxlength="150" minlength="3">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label for="url">Url</label>
            <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url">
            @error('url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group d-flex gap-4">
            <p>Seleziona i Tag:</p>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label for="" class="form-check-label">{{ $tag->name }}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex gap-3">
             <button type="submit" class="btn btn-success w-10">Save</button>
             <button type="reset" class="btn btn-primary w-10">Reset</button>
        </div>

    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
