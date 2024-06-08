@extends('layouts.admin')


@section('content')

<div class="container">

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Evidence</th>
                    <th scope="col">Published</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($photos as $photo)
                <tr class="">
                    <td scope="row">{{$photo->id}}</td>
                    <td><img src="{{$photo->image}}" alt="image"></td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->in_evidence}}</td>
                    <td>{{$photo->is_published}}</td>
                    <td>
                        <a href="{{route('admin.photos.show', $photo)}}">
                            View
                        </a>
                    </td>
                </tr>

                @empty
                <tr class="">
                    <td scope="row">No photos</td>
                </tr>
                @endforelse




            </tbody>
        </table>
    </div>
</div>



@endsection