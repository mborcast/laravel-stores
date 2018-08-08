<?php

namespace LaravelStores\Web\Resources\Customers;

use Illuminate\Http\Request;
use LaravelStores\Http\Controllers\Controller;
use LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface;

class CustomersController extends Controller {
    private $_customersService;

    public function __construct(CustomersServiceInterface $customersService) {
        $this->_customersService = $customersService;
    }
    public function index() {
        return $this->_customersService->getAll();
    }
    public function find($id) {
        return $this->_customersService->get($id);
    }
}
