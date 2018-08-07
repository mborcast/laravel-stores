<?php

namespace LaravelDetails\Web\Resources\Details;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model {
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
