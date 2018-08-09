<?php

namespace LaravelStores\Web\Resources\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {
    protected $guarded = [
        'id'
    ];
    protected $dates = [
        'date'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function store() {
        return $this->belongsTo('LaravelStores\Web\Resources\Stores\Store');
    }
    public function products() {
        return $this->belongsToMany(
            'LaravelStores\Web\Resources\Products\Product',
            'details',
            'sale_id',
            'product_id')
            ->withPivot('units');
    }
}
