@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container">
        <h1>
            Tags
        </h1>
    </div>
</header>

<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <form action="{{route('admin.tags.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="Nutrition" />
                    <small id="nameHelper" class="form-text text-muted">Tag name</small>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus fa-sm fa-fw"></i>
                </button>


            </form>
        </div>
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                        <tr class="">
                            <td scope="row">{{$tag->id}}</td>
                            <td>
                                <form action="{{route('admin.tags.update', $tag)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value="{{$tag->name}}" />
                                    </div>

                                </form>
                            </td>
                            <td>{{$tag->count}}</td>
                            <td>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#modalId-{{$tag->id}}">
                                    <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{$tag->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalNameId-{{$tag->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-name" id="modalNameId-{{$tag->id}}">
                                                    Delete tag
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You are about to destroy this tag! Are you sure?
                                                <strong>{{$tag->name}}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
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
                            <td scope="row">No tags</td>
                        </tr>
                        @endforelse




                    </tbody>
                </table>
                {{$tags->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>



</div>



@endsection