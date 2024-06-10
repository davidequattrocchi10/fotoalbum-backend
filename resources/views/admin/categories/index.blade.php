@extends('layouts.admin')


@section('content')

<header class="bg-dark text-white py-4 ">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Categories
        </h1>
        <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Create</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Total Photos</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr class="">
                    <td scope="row">{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{$category->photos->count()}}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary mt-1" href="{{route('admin.categories.show', $category)}}">
                            <i class="fas fa-eye fa-xs fa-fw"></i> View
                        </a>
                        <a class="btn btn-sm btn-primary mt-1" href="{{route('admin.categories.edit', $category)}}">
                            <i class="fas fa-pencil fa-xs fa-fw"></i> Edit
                        </a>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-danger btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#modalId-{{$category->id}}">
                            <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId-{{$category->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$category->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-name" id="modalNameId-{{$category->id}}">
                                            Delete category
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to destroy this category! Are you sure?
                                        <strong>{{$category->name}}</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <form action="{{route('admin.categories.destroy', $category)}}" method="post">
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
                    <td scope="row">No categories</td>
                </tr>
                @endforelse




            </tbody>
        </table>
    </div>
    {{$categories->links('vendor.pagination.bootstrap-5')}}
</div>



@endsection