<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Photo::orderByDesc('id')->get());

        return view('admin.photos.index', ['photos' => Photo::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        $tags = Tag::all();
        return view('admin.photos.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //validate
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('image')) {
            $image_path = Storage::put('uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        // dd($val_data);

        //create
        $photo = Photo::create($val_data);

        //execute attach if tags exist
        if ($request->has('tags')) {
            $photo->tags()->attach($val_data['tags']);
        }


        //redirect
        return to_route('admin.photos.index')->with('message', 'Photo Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.photos.edit', compact('photo', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //validate
        $val_data = $request->validated();
        // dd($val_data);
        $val_data['slug'] = Str::slug($request->title, '-');


        // check if request has a image
        if ($request->has('image')) {
            // check if the current photo has a image
            if ($photo->image) {
                // delete old image
                Storage::delete($photo->image);
            }
            //upload new image
            $image_path = Storage::put('uploads', $request->image);
            //add new image in val_data
            $val_data['image'] = $image_path;
        }

        //update
        $photo->update($val_data);

        //execute sync if tags exist
        if ($request->has('tags')) {
            $photo->tags()->sync($val_data['tags']);
        }

        //redirect
        return to_route('admin.photos.index')->with('message', 'Photo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if ($photo->image) {
            // delete old image
            Storage::delete($photo->image);
        }

        //delete
        $photo->delete();

        //redirect
        return to_route('admin.photos.index')->with('message', 'Photo Deleted Successfully');
    }
}
