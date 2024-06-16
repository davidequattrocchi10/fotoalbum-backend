@extends('layouts.app')

@section('content')

<div class="p-5 mb-4 bg-light">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Get in touch!</h1>
        <p class="col-md-8 fs-4 px-2">
            <i>If you need a photographer or want to know how to purchase my photos
                or other information I am at your disposal.</i>
        </p>
        <a class="btn btn-primary btn-lg" href="#contact-form">
            Contact me
        </a>
    </div>
</div>

<div class="container">

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    @include('partials.errors')

    <form action="{{route('contacts.store')}}" id="contact-form" method="post" class="my-2">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="John Wayne" />
            <small id="nameHelper" class="form-text text-muted">Type your full name</small>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Email</label>
            <input type="email" class="form-control" name="address" id="address" aria-describedby="addressHelper" placeholder="abc@mail.com" />
            <small id="addressHelper" class="form-text text-muted">Type your full email address</small>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>


    </form>
</div>

@endsection