@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Add Category
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.categories.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">

    @include('partials.errors')



    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName" placeholder="Nature with Nature" value="{{old('name')}}" />
            <small id="helpName" class="form-text text-muted">Category name</small>
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
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