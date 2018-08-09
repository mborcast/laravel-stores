<?php

namespace LaravelStores\Web\Resources\Customers;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function sales() {
        return $this->hasMany('LaravelStores\Web\Resources\Sales\Sale', 'customer_id', 'id');
    }
}
