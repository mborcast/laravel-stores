<?php

namespace LaravelStores\Web\Resources\Sales\Services;

use LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface;
use LaravelStores\Web\Resources\Sales\Repositories\SalesRepositoryInterface;

class SalesService implements SalesServiceInterface {

    private $_sales;

    public function __construct(SalesRepositoryInterface $salesRepository) {
        $this->_sales = $salesRepository;
    }    
    public function create($data) {
        return response()->json(
            $this->_sales->create($data),
            201
        );
    }
    public function get($id) {
        $lSale = $this->_sales->get($id);
        if ($lSale == null) {
            return view('404');
        }
        return view('sales.details', [
            'sale' => $lSale
        ]);
    }
    public function getAll() {
        return view('sales.index', [
            'sales' => $this->_sales->getAll()
        ]);
    }
    public function update($data, $id) {
        $lSale = $this->_sales->update($data, $id);
        if ($lSale == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lSale,
            200
        );
    }
    public function delete($id) {
        $lSale = $this->_sales->get($id);
        if ($lSale == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        if ($this->_sales->delete($id)) {
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
