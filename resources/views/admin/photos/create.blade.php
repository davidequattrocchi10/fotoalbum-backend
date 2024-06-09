@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Create Photo
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
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Nature with Nature" />
            <small id="helpTitle" class="form-text text-muted">Add title to photo</small>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="image" aria-describedby="imageHelper" />
            <div id="imageHelper" class="form-text">Upload Image</div>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">
            Create
        </button>




    </form>
</div>



@endsection