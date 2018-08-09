<?php

namespace LaravelStores\Web\Resources\Sales;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface;

class SalesController extends Controller {
    private $_salesService;

    public function __construct(SalesServiceInterface $salesService) {
        $this->_salesService = $salesService;
    }
    public function index() {
        return $this->_salesService->getAll();
    }
    public function find($id) {
        return $this->_salesService->get($id);
    }
}
