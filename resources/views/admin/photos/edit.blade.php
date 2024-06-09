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
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description', $photo->description)}}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">
            Update
        </button>




    </form>
</div>



@endsection