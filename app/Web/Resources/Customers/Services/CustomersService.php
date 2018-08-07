<?php

namespace LaravelStores\Web\Resources\Customers\Services;

use LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface;
use LaravelStores\Web\Resources\Customers\Repositories\CustomersRepositoryInterface;

class CustomersService implements CustomersServiceInterface {

    private $_customers;

    public function __construct(CustomersRepositoryInterface $customersRepository) {
        $this->_customers = $customersRepository;
    }    
    public function create($data) {
        return response()->json(
            $this->_customers->create($data),
            201
        );
    }
    public function get($id) {
        $lCustomer = $this->_customers->get($id);
        if ($lCustomer == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lCustomer,
            200
        );
    }
    public function getAll() {
        return response()->json(
            $this->_customers->getAll(), 
            200
        );
    }
    public function update($data, $id) {
        $lCustomer = $this->_customers->update($data, $id);
        if ($lCustomer == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lCustomer,
            200
        );
    }
    public function delete($id) {
        $lCustomer = $this->_customers->get($id);
        if ($lCustomer == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        if ($this->_customers->delete($id)) {
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
