@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Edit: {{$photo->title}}
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.photos.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">


    @include('partials.errors')


    <form action="{{route('admin.photos.update', $photo)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Nature with Nature" value="{{old('title', $photo->title)}}" />
            <small id="helpTitle" class="form-text text-muted">Add title to photo</small>
            @error('title')
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
                <option value="{{$category->id}}" {{ (isset($photo->category) && $category->id == old('category_id', (isset($photo->category) ? $photo->category->id : null))) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3 d-flex gap-3 flex-wrap">
            @foreach($tags as $tag)
            <div class="form-check">

                @if($errors->any())
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}} />

                @else
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" {{$photo->tags->contains($tag->id) ? 'checked' : ''}} />

                @endif
                <label class="form-check-label" for="tag-{{$tag->id}}"> {{$tag->name}} </label>
            </div>
            @endforeach
        </div>



        <div class="d-flex gap-3 my-4 mx-1">
            @if (Str::startsWith($photo->image, 'https://'))
            <img width="170" height="170" src="{{$photo->image}}" alt="Image">
            @else
            <img width="170" height="170" src="{{asset('storage/' . $photo->image)}}" alt="Image">
            @endif
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="image" aria-describedby="imageHelper" />
                <div id="imageHelper" class="form-text">Upload Image</div>
            </div>
            @error('image')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="my-3">
            <div class="mb-3">
                <div class="form-check">
                    @if($errors->any())
                    <input class="form-check-input" type="checkbox" value="1" id="in_evidence" name="in_evidence" {{ old('in_evidence') == 1 ? 'checked' : '' }} />
                    @else
                    <input class="form-check-input" type="checkbox" value="1" id="in_evidence" name="in_evidence" {{ $photo->in_evidence ? 'checked' : ''  }} />
                    @endif
                    <label class="form-check-label" for="in_evidence">Put in evidence </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    @if($errors->any())
                    <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published" {{ old('is_published') == 1 ? 'checked' : '' }} />
                    @else
                    <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published" {{ $photo->is_published ? 'checked' : ''  }} />
                    @endif
                    <label class="form-check-label" for="is_published">To publish </label>
                </div>
            </div>
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description', $photo->description)}}</textarea>
            @error('description')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            <i class="fas fa-arrow-left fa-sm fa-fw"></i> Update
        </button>




    </form>
</div>



@endsection