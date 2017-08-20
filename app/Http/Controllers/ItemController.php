<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination;
class ItemController extends Controller
{
    //get all items
    public function getAllItems(){
        $categories = Category::all();
        $items = Item::orderBy('id', 'DESC')->paginate(4);
        if(Auth::user()->status == 0){
            return view('adminPages.item.item', compact('items'));
        }else{
            return view('userPages.item', compact('items', 'categories'));
        }

    }

    //get item by id for the user
    public function getItemById($id)
    {
        $item = Item::all()->where('id', '=', $id);
        return view('userPages.itemById', compact('item'));
    }

    //get form to add new item for admin
    public function getAddItemForm()
    {
        $categories = Category::all();
        return view('adminPages.item.addItem', compact('categories'));
    }
    //adding a new item
    public function addItem(Request $request)
    {
        $item = new Item;
        $item->brand = $request->brand;
        $item->name = $request->name;
        $item->category_id = $request->categories;
        $item->description = $request->description;
        $item->img_link = $request->img_link;
        $item->price = $request->price;
        $item->rate = $request->rate;
        $item->save();
        return redirect('/dashboard/item');
    }

    public function getItemUpdate($id)
    {
        $item = Item::all()->where('id', '=', $id);
        return view('adminPages.item.editItem', compact('item'));
    }
    //update an item
    public function itemUpdate(Item $item , Request $request)
    {
        $item->brand = $request->brand;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->img_link = $request->img_link;
        $item->rate = $request->rate;
        $item->update();
        return redirect('/dashboard/item');
    }
    //delete item
    public function itemDelete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/dashboard/item');
    }

//    public function getSearch()
//    {
//        return view('search');
//    }

    //search item by name  or brand
    public function getSearchItem(Request $request)
    {
        $s = $request->Input('s');
        $items = Item::search($s)->get();
        return view('userPages.item', compact('items','s'));
    }

    //select between min and max price
    public function getInBetweenPrice(Request $request)
    {
        $min = $request->Input('min');
        $max = $request->Input('max');
        $items= Item::searchPrice($min,$max)->get();

        return view('userPages.item', compact('items'));
    }

}
