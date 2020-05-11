<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
	protected $fillable = [
        'name', 'information', 'price'
    ];
    
    protected $attributes = [
    	'information' => 'There is no available information!'
    ];

    public function categories() {
    	return $this->belongsToMany('App\Category');
    }

}
