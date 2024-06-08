@extends('layouts.admin')


@section('content')

<div class="container">
    <form action="{{route('admin.photos.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Nature with Nature" />
            <small id="helpTitle" class="form-text text-muted">Add title to photo</small>
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