@extends('layouts.admin')


@section('content')


<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$category->name}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.categories.index')}}"> <i class="fas fa-arrow-left fa-sm fa-fw"></i>Back</a>
    </div>
</header>

<div class="container mt-4 border border-primary p-2">
    <div class="row">
        <p>
            <strong>Description </strong>
            <br>
            {{$category->description}}
        </p>
        <p>
            <strong> Slug </strong>
            <br>
            {{$category->slug}}
        </p>
    </div>
</div>

@endsection