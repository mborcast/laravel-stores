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
}
