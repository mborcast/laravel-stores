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
    public function index(Request $request) {
        $lCurrentPage = ($request->page ? $request->page : 1);
        $lProducts = $this->_productsService->getPage($lCurrentPage);
        if ($request->ajax()) {
            return $lProducts;
        }
        return view('products.index', [
            'products' => $lProducts,
            'current' => $lCurrentPage,
            'pages' => $this->_productsService->getPagesCount()
        ]);
    }
    public function find($id) {
        return $this->_productsService->get($id);
    }
}
