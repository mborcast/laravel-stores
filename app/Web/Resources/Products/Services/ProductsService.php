<?php

namespace LaravelStores\Web\Resources\Products\Services;

use LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface;
use LaravelStores\Web\Resources\Products\Repositories\ProductsRepositoryInterface;

class ProductsService implements ProductsServiceInterface {

    private $_products;

    public function __construct(ProductsRepositoryInterface $productsRepository) {
        $this->_products = $productsRepository;
    }    
    public function create($data) {
        return response()->json(
            $this->_products->create($data),
            201
        );
    }
    public function get($id) {
        $lProduct = $this->_products->get($id);
        if ($lProduct == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lProduct,
            200
        );
    }
    public function getAll() {
        return response()->json(
            $this->_products->getAll(), 
            200
        );
    }
    public function update($data, $id) {
        $lProduct = $this->_products->update($data, $id);
        if ($lProduct == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lProduct,
            200
        );
    }
    public function delete($id) {
        $lProduct = $this->_products->get($id);
        if ($lProduct == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        if ($this->_products->delete($id)) {
            return response()->json(
                null, 
                204
            );
        }
        return response()->json(
            ['message' => 'Deletion failed'], 
            500
        );
    }
}
