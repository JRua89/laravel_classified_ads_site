<?php

namespace App\Http\Controllers;
use App\Models\Area;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        
        $areas = Area::get()->toTree();
        
        return view('home', compact('areas'));
    }
}
