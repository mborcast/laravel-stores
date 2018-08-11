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
    public function index(Request $request) {
        $lCurrentPage = ($request->page ? $request->page : 1);
        $lSales = $this->_salesService->getPage($lCurrentPage);
        if ($request->ajax()) {
          return $lSales;
        }
        return view('sales.index', [
            'sales' => $lSales,
            'current' => $lCurrentPage,
            'pages' => $this->_salesService->getPagesCount()
        ]);
    }
    public function find($id) {
        return $this->_salesService->get($id);
    }
}
