<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
    public function getAllItems()
    {
        $items = Item::all();

        return response()->json(['Items' => $items]);
    }
}
