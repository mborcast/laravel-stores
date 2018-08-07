<?php

namespace LaravelStores\Web\Resources\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function sales() {
        return $this->belongsToMany(
            'LaravelStores\Web\Resources\Sales\Sale',
            'details',
            'product_id',
            'sales_id'
        )->withPivot('units');
    }
}
