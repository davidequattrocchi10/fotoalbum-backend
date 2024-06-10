<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tags.index', ['tags' => Tag::paginate(10)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        //validate
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->name, '-');

        // dd($val_data);

        //create
        Tag::create($val_data);


        //redirect
        return to_route('admin.tags.index')->with('message', 'Tag Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //validate
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->name, '-');

        // dd($val_data);

        //create
        $tag->update($val_data);


        //redirect
        return to_route('admin.tags.index')->with('message', 'Tag Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //delete tag
        $tag->delete();

        //redirect
        return to_route('admin.tags.index')->with('message', 'Tag Deleted Successfully');
    }
}
