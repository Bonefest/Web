<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showItems() {

      $items = [];
      if(request()->has('category')) {
        $id = request()->category;
        if($id == 0) {
          $items = Item::all();
        }
        else {
          $category = Category::find($id);
          if($category != null) {
            $items = $category->items;
          }
        }
      } else {
          $items = Item::all();
      }

      $categories = Category::all();

    	return view('item_list', ['items' => $items, 'categories' => $categories]);
    }

    public function showItem($id) {
    	$item = Item::find($id);
    	if($item == null) {
    		return view('errors');
    	}

      $categories = $item->categories;

    	return view('item_info', ['item' => $item, 'categories' => $categories]);
    }

    public function createItem(Request $request) {
    	if($request->post('post_type') == "create_item") {

	    	$name = $request->input('item_name');
	    	$price = $request->input('item_price');
	    	if(!Item::where('name', '=', $name)->exists()) {
	    		$item = Item::create(array('name' => $name, 'price' => $price));
          $checkboxes = $request->input('checkbox_categories');
          foreach($checkboxes as $checkbox) {
            $item->categories()->attach(Category::find($checkbox));
          }
          $item->save();

	    	}
   		} else if($request->post('post_type') == "delete_items") {
   			$checkboxes = $request->input('checkbox');
   			foreach ($checkboxes as $checkbox) {
   				if(Item::find($checkbox)) {
   					Item::destroy($checkbox);
   				}
   			}
   		}

    	return Controller::showItems();
    }

}
