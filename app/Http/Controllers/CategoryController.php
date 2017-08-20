<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use Illuminate\Http\Request;
use App\Item;
use App\User;
use Auth;

class CategoryController extends Controller
{
    //Get All Categories
    public function getAllCategories()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('adminPages.category.category', compact('categories'));
    }

    //Add New Category
    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/dashboard/category');
    }

    //Get the form to Update Category
    public function getCategoryUpdate($id)
    {
        $category = Category::all()->where('id', '=', $id);
        return view('adminPages.category.editCategory', compact('category'));
    }
    //add the new update to category
    public function categoryUpdate(Category $category , Request $request)
    {
        $category->name = $request->name;
        $category->update();
        return redirect('/dashboard/category');
    }
    //Delete Category
    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/dashboard/category');
    }

    //Count Item, User, Category for Dashboard
    public function getCountAll()
    {
        if(Auth::guest() || !Auth::user()->status == 0 ){
            return redirect('/');

        } else{
            $user= User::all()->where('status','=','1');
            $category = Category::all();
            $item = Item::all();
            $orders = Order::all();
            return view('adminPages.dashboard', compact('user','category','item','orders'));
        }

    }

//    public function getSearchCategory(Request $request)
//    {
//        $category_id =  $request->Input('id');
//        $items = Item::searchCategory($category_id)->get();
//        return view('userPages.item', compact('items'));
//    }
}
