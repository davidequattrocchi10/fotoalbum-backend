@extends('layouts.app')
@section('content')

<div id="jumbotron" class="jumbotron rounded-3 pb-5" style="margin-top: -0.5rem;">
    <div class="overlay"></div>
    <div class="container-over container py-3">
        <div class="d-flex justify-content-center align-items-center">
            <div class="mx-5 text-center">
                <h1 class="display-5 fw-bold">
                    Welcome to <em>Capture</em>
                </h1>
                <p class="fs-4">See my amazing Photos</p>
            </div>
        </div>
        <div class="container-fluid my-2">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="width: 70%; height:500px; margin:auto;">
                    @foreach ($photos_main as $index => $photo)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
                        @if (Str::startsWith($photo->image, 'https://'))
                        <img class="d-block w-100" style="width: 200%; height:500px;" src="{{$photo->image}}" alt="Image">
                        @else
                        <img class="d-block w-100" style="width: 200%; height:500px;" src="{{asset('storage/' . $photo->image)}}" alt="Image">
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron-overlay"></div>
</div>






</div>
<div class="p-2 mb-4">
    <div class="container py-2">
        <h3 class="py-2">Capture the World: A Stunning Collection of Photos</h3>

        <p>
            Immerse yourself in a captivating visual journey on Capture the World.
            Explore a vast library of photographs showcasing the beauty and diversity of our planet.
            From breathtaking landscapes and captivating wildlife to intimate portraits and vibrant cityscapes,
            our curated collection offers something for every visual explorer.
            Delve into thematic galleries, discover hidden gems through user-submitted content,
            and be inspired by the artistry of talented photographers.
        </p>
    </div>
</div>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($photos as $photo)
            <div class="col mb-3" style="max-height: 400px;">
                <div class="card" style="height: 100%;">
                    @if (Str::startsWith($photo->image, 'https://'))
                    <img class="card-img-top" style="height: 85%; width: 100%;" src="{{$photo->image}}" alt="Image">
                    @else
                    <img class="card-img-top" style="height: 85%; width: 100%;" src="{{asset('storage/' . $photo->image)}}" alt="Image">
                    @endif

                    <div class="card-body" style="height: 15%;">
                        <h5>{{$photo->title}}</h5>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        {{$photos->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>

@endsection