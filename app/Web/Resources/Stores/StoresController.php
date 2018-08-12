<?php

namespace LaravelStores\Web\Resources\Stores;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface;
use LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface;
use LaravelStores\Web\Resources\Stores\Requests\CreateStoresRequest;

class StoresController extends Controller {
  private const RELATIONSHIP_ITEMS_PP = 4;
  private $_storesService;

  public function __construct(StoresServiceInterface $storesService) {
    $this->_storesService = $storesService;
  }
  public function index(Request $request) {
      $lCurrentPage = ($request->page ? $request->page : 1);
      $lPagesCount = $this->_storesService->getPagesCount();

      if ($lCurrentPage > $lPagesCount) {
        return view('404');
      }
      $lStores = $this->_storesService->getPage($lCurrentPage);
      if ($request->ajax()) {
          return $lStores;
      }
      return view('stores.index', [
          'stores' => $lStores,
          'current' => $lCurrentPage,
          'pages' => $lPagesCount
      ]);
  }
  public function find($id) {
    $lStore = $this->_storesService->get($id);
    if (!$lStore) {
      return view('404');
    }
    return view('stores.about', [
        'store' => $lStore
    ]);
  }
  public function getCustomersIndex(Request $request, $id) {
    $lCurrentPage = ($request->page ? $request->page : 1);
    $lStore = $this->_storesService->get($id);
    if (!$lStore) {
      if ($request->ajax()) {
        return [];
      }
      return view('404');
    }
    $lItemsCount = count($lStore->customers);
    $lPivotIdx = ($lCurrentPage - 1) * self::RELATIONSHIP_ITEMS_PP;
    if ($lPivotIdx >= $lItemsCount) {
      return view('404');
    }
    $lCustomers = $lStore->customers->slice($lPivotIdx, self::RELATIONSHIP_ITEMS_PP)->values();
    if ($request->ajax()) {
      return $lCustomers;
    }
    return view('customers.index', [
      'customers' => $lCustomers,
      'current' => $lCurrentPage,
      'pages' => (int)ceil($lItemsCount / self::RELATIONSHIP_ITEMS_PP)
    ]);
  }
  public function getSalesIndex(Request $request, $id) {
    $lCurrentPage = ($request->page ? $request->page : 1);
    $lStore = $this->_storesService->get($id);
    if (!$lStore) {
      if ($request->ajax()) {
        return [];
      }
      return view('404');
    }
    $lItemsCount = count($lStore->sales);
    $lPivotIdx = ($lCurrentPage - 1) * self::RELATIONSHIP_ITEMS_PP;
    if ($lPivotIdx >= $lItemsCount) {
      return view('404');
    }
    $lSales = $lStore->sales->slice($lPivotIdx, self::RELATIONSHIP_ITEMS_PP)->values();
    if ($request->ajax()) {
      return $lSales;
    }
    return view('sales.index', [
      'sales' => $lSales,
      'current' => $lCurrentPage,
      'pages' => (int)ceil($lItemsCount / self::RELATIONSHIP_ITEMS_PP)
    ]);
  }
  public function create() {
    return view('stores.submit', [
      'title' => 'Create store'
    ]);
  }
  public function store(CreateStoresRequest $request) {
    return $this->_storesService->create($request->all());
  }
  public function edit($id) {
    $lStore = $this->_storesService->get($id);
    if ($lStore == null) {
      return view('404');
    }
    return view('stores.submit', [
      'title' => 'Edit store',
      'store' => $lStore
    ]);
  }
  public function update(CreateStoresRequest $request, $id) {
    return $this->_storesService->update($id, $request->all());
  }
  public function destroy($id) {
    return $this->_storesService->delete($id);
  }
}
