@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Add Photo
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.photos.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">

    @include('partials.errors')



    <form action="{{route('admin.photos.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Nature with Nature" value="{{old('title')}}" />
            <small id="helpTitle" class="form-text text-muted">Add title to photo</small>
            @error('title')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="image" aria-describedby="imageHelper" />
            <div id="imageHelper" class="form-text">Upload Image</div>
            @error('image')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id">
                <option selected disabled>Select one</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}> {{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-flex gap-3 flex-wrap">
            @foreach($tags as $tag)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}} />
                <label class="form-check-label" for="tag-{{$tag->id}}"> {{$tag->name}} </label>
            </div>
            @endforeach
        </div>


        <div class="my-3">
            <div class="mb-3">
                <div class="form-check">
                    <label class="form-check-label" for="in_evidence">Put in evidence </label>
                    <input class="form-check-input" type="checkbox" value="1" id="in_evidence" name="in_evidence" {{ old('in_evidence') == 1 ? 'checked' : '' }} />
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <label class="form-check-label" for="is_published"> To publish </label>
                    <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published" {{ old('is_published') == 1 ? 'checked' : '' }} />
                </div>
            </div>
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
            @error('description')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Create
        </button>




    </form>
</div>



@endsection