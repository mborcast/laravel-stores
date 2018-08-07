<?php

namespace LaravelStores\Web\Resources\Products;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    public function index() {
        return view('welcome');
    }
}
