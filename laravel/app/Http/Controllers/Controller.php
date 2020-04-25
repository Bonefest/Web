<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Item;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showItems() {
    	$items = Item::all();

    	return view('item_list', ['items' => $items]);
    }

    public function showItem($id) {
    	$item = Item::find($id);
    	if($item == null) {
    		return view('errors');
    	}

    	return view('item_info', ['item' => $item]);
    }

    public function createItem(Request $request) {
    	if($request->post('post_type') == "create_item") {

	    	$name = $request->input('item_name');
	    	$price = $request->input('item_price');
	    	if(!Item::where('name', '=', $name)->exists()) {
	    		Item::create(array('name' => $name, 'price' => $price));
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
