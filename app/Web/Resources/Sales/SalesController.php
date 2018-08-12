<?php

namespace LaravelStores\Web\Resources\Sales;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface;
use LaravelStores\Web\Shared\RelationshipsPaginator;
use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface;
use LaravelStores\Web\Resources\Sales\Requests\CreateSalesRequest;

class SalesController extends Controller {
    private $salesService;
    private $storesService;
    private $productsService;
    
    public function __construct(
      SalesServiceInterface $salesService,
      StoresServiceInterface $storesService,
      ProductsServiceInterface $productsService) {
      $this->salesService = $salesService;
      $this->storesService = $storesService;
      $this->productsService = $productsService;
    }

    public function index(Request $request) {
      $lPage = $this->salesService->getPage(($request->page ? $request->page : 1));
      if ($request->ajax()) {
        return $lPage['sales'];
      }
      if ($lPage) {
        return view('sales.index', $lPage);
      }
      return view('404');
    }
    public function find($id) {
      $lSale = $this->salesService->get($id);
      if ($lSale) {
        return view('sales.about', ['sale' => $lSale]);
      }
      return view('404');
    }
    public function create() {
      return view('sales.submit', [
        'title' => 'Create sale'
      ]);
    }
    public function store(CreateSalesRequest $request) {
      return $this->salesService->create($request->all());
    }
    public function edit($id) {
      $lSale = $this->salesService->get($id);
      if ($lSale == null) {
        return view('404');
      }
      return view('sales.submit', [
        'title' => 'Edit sale',
        'sale' => $lSale
      ]);
    }
    public function update(CreateSalesRequest $request, $id) {
      return $this->salesService->update($id, $request->all());
    }
    public function destroy($id) {
      return $this->salesService->delete($id);
    }
    public function batchDestroy(Request $request) {
      return $this->salesService->batchDelete($request->all());
    }
}
