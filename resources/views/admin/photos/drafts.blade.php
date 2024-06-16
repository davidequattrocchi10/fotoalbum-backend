@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Photos
        </h1>
        <a class="btn btn-primary" href="{{route('admin.photos.create')}}">Create</a>
    </div>
</header>

<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="table-responsive-sm">
        <table class="table table-light">
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
                    <td>
                        @if (Str::startsWith($photo->image, 'https://'))
                        <img width="140" height="140" src="{{$photo->image}}" alt="Image">
                        @else
                        <img width="140" height="140" src="{{asset('storage/' . $photo->image)}}" alt="Image">
                        @endif
                    </td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->in_evidence ? 'True' : 'False'}}</td>
                    <td>{{ $photo->is_published ? 'True' : 'False' }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary px-3 mt-1" href="{{route('admin.photos.edit', $photo)}}">
                            <i class="fas fa-pencil fa-xs fa-fw"></i> Edit
                        </a>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-danger btn-sm mt-1 px-2" data-bs-toggle="modal" data-bs-target="#modalId-{{$photo->id}}">
                            <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId-{{$photo->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$photo->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId-{{$photo->id}}">
                                            Delete Photo
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to destroy this photo! Are you sure?
                                        <strong>{{$photo->title}}</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <form action="{{route('admin.photos.destroy', $photo)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Confirm
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    {{$photos->links('vendor.pagination.bootstrap-5')}}
</div>



@endsection