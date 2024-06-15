<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['photos' => Photo::all()]);
    }
}
