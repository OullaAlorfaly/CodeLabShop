<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $category = Category::all();

        return response()->json(['Category' => $category]);
    }
}
