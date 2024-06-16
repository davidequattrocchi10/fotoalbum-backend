<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $query = Photo::with(['category', 'tags'])->orderByDesc('id')->where('is_published', true);

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search')) {
            $query = $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        $results = $query->paginate(3);

        return response()->json([
            'success' => true,
            'results' => $results
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

    public function main()
    {
        return response()->json([
            'success' => true,
            'results' => Photo::orderByDesc('id')->where('in_evidence', true)->get()
        ]);
    }
}
