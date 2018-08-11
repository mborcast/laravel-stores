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
    public function index(Request $request) {
        $lCurrentPage = ($request->page ? $request->page : 1);
        $lCustomers = $this->_customersService->getPage($lCurrentPage);
        if ($request->ajax()) {
            return $lCustomers;
        }
        return view('customers.index', [
            'customers' => $lCustomers,
            'current' => $lCurrentPage,
            'pages' => $this->_customersService->getPagesCount()
        ]);
    }
    public function find($id) {
        return $this->_customersService->get($id);
    }
}
