@extends('layouts.admin')


@section('content')


<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$photo->title}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.photos.index')}}">Back</a>
    </div>
</header>

<div class="container mt-4 border border-primary p-2">
    <div class="row">
        <div class="col-6 text-center my-2">
            @if (Str::startsWith($photo->image, 'https://'))
            <img loading="lazy" src="{{$photo->image}}" alt="Image" width="100%">

            @else
            <img loading="lazy" src="{{asset('storage/' . $photo->image)}}" alt="Image" width="100%">

            @endif
        </div>
        <div class="col-6 my-2 p-3">
            <p>
                <strong>Description </strong>
                <br>
                {{$photo->description}}
            </p>
            <p>
                <strong> Slug </strong>
                <br>
                {{$photo->slug}}
            </p>
            <div>{{$photo->in_evidence}}</div>
            <div>{{$photo->is_published}}</div>
        </div>

    </div>



</div>




@endsection