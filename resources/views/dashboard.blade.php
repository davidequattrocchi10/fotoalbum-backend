@php
$evidenceCount = 0;
$draftCount = 0;
$photoCount = 0;
foreach ($photos as $photo) {
$photoCount++;
if ($photo->in_evidence) { $evidenceCount++; }
if (!$photo->is_published) { $draftCount++; }
}
@endphp


@extends('layouts.admin')

@section('content')
<div class="container bg-light">
    <div class="text-center text-secondary">
        <h1 class="fs-2  my-3 p-3">
            <strong>Welcome Admin</strong>
        </h1>
        <h5 class="fs-4 my-2"> Have a good day. This is your platform data:</h5>
    </div>
    <div class="row px-5">
        <div class="col ">
            <ol class="list-group list-group-numbered">
                <li class="list-group-item list-group-item-info my-3">You have <span class="badge text-bg-primary px-2 mx-1">{{$photoCount}} </span> photos in the platform. </li>
                <li class="list-group-item my-3 {{ $draftCount == 0 ? 'list-group-item-info' : 'list-group-item-danger' }}"> There are <span class="badge text-bg-primary px-2 mx-1">{{$draftCount}}</span> photos in the draft that have yet to be published. </li>
                <li class="list-group-item list-group-item-info my-3"> Of the photos published there are <span class="badge text-bg-primary px-2 mx-1">{{$evidenceCount}}</span> highlighted photos </li>
            </ol>

        </div>
    </div>
</div>
@endsection