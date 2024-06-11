@extends('layouts.admin')


@section('content')


<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$photo->title}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.photos.index')}}"> <i class="fas fa-arrow-left fa-sm fa-fw"></i>Back</a>
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
            <div class="metadata mb-2">
                <strong>Category</strong>
                <br>
                {{$photo->category ? $photo->category->name : 'Uncategorized'}}

                <div class="tags my-2">
                    <strong>Tags:</strong>
                    <br>
                    @forelse ($photo->tags as $tag)
                    <span class="badge bg-primary">{{$tag->name}}</span>
                    @empty
                    <span>N/A</span>
                    @endforelse

                </div>

            </div>
            <p>
                <strong> In evidence </strong>
                <br>
                {{$photo->in_evidence ? 'True' : 'False'}}
            </p>
            <p>
                <strong> Published </strong>
                <br>
                {{ $photo->is_published ? 'True' : 'False' }}
            </p>
        </div>

    </div>



</div>




@endsection