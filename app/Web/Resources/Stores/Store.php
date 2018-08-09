<?php

namespace LaravelStores\Web\Resources\Stores;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function customers() {
        return $this->belongsToMany(
            'LaravelStores\Web\Resources\Customers\Customer',
            'sales',
            'store_id',
            'customer_id');
    }
    public function sales() {
        return $this->hasMany('LaravelStores\Web\Resources\Sales\Sale', 'store_id', 'id');
    }
}
