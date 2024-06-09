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
                <option value="{{$category->id}}" {{ $category->id == old('category_id', $photo->category->id) ? 'selected' : '' }}>
                    {{$category->name}}
                </option>
                @endforeach
            </select>
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