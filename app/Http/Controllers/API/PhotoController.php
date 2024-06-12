<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return response()->json([
                'success' => true,
                'results' => Photo::with(['category', 'tags'])->orderByDesc('id')->where('title', 'LIKE', '%' . $request->search . '%')->paginate()
            ]);
        }



        return response()->json([
            'success' => true,
            'results' => Photo::with(['category', 'tags'])->orderByDesc('id')->paginate(3)
        ]);
    }


    public function show($id)
    {

        $photo = Photo::with(['category', 'tags'])->where('id', $id)->first();

        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "404 Not Found"
            ]);
        }
    }
}
