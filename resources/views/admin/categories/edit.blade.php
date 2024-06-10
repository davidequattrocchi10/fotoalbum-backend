@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Edit: {{$category->name}}
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.categories.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">


    @include('partials.errors')


    <form action="{{route('admin.categories.update', $category)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName" placeholder="Nature with Nature" value="{{old('name', $category->name)}}" />
            <small id="helpName" class="form-text text-muted">Update category name</small>
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description', $category->description)}}</textarea>
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