@extends('layouts.admin')


@section('content')

<div class="container">
    <dic>{{$photo->id}}</dic>
    <div><img src="{{$photo->image}}" alt="image"></div>
    <div>{{$photo->title}}</div>
    <div>{{$photo->in_evidence}}</div>
    <div>{{$photo->is_published}}</div>

</div>



@endsection