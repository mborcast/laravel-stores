<?php

namespace LaravelStores\Web\Resources\Products;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface;

class ProductsController extends Controller {
    private $_productsService;

    public function __construct(ProductsServiceInterface $productsService) {
        $this->_productsService = $productsService;
    }
    public function index() {
        return view('products.index');
    }
}
