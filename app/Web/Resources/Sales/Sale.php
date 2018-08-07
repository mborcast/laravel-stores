<?php

namespace LaravelStores\Web\Resources\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
