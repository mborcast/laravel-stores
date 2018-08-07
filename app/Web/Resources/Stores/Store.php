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
}
