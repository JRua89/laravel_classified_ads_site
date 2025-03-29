<?php

namespace App\Http\Controllers\Category;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
        
        $categories = Category::withListingsInArea($area)->get()->toTree();

        return view('categories.index', compact('categories'));
    }
}
