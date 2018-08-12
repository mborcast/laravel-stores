<?php

namespace LaravelStores\Web\Resources\Stores;

use Illuminate\Http\Request;
use LaravelStores\Http\Controllers\Controller;
use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Stores\Requests\CreateStoresRequest;
use LaravelStores\Web\Shared\RelationshipsPaginator;

class StoresController extends Controller {
  private $storesService;
  private $paginator;

  public function __construct(
    StoresServiceInterface $storesService, 
    RelationshipsPaginator $paginator) {
    $this->storesService = $storesService;
    $this->paginator = $paginator;
  }
  public function index(Request $request) {
    $lPage = $this->storesService->getPage(($request->page ? $request->page : 1));
    if ($request->ajax()) {
      return $lPage['stores'];
    }
    if ($lPage) {
      return view('stores.index', $lPage);
    }
    return view('404');
  }
  public function find($id) {
    $lStore = $this->storesService->get($id);
    if ($lStore) {
      return view('stores.about', ['store' => $lStore]);
    }
    return view('404');
  }
  public function search(Request $request) {
    if ($request->ajax()) {
     return $this->storesService->searchByName($request->name);
    }
  }
  public function getCustomersIndex(Request $request, $id) {
    $lStore = $this->storesService->get($id);
    if (!$lStore) {
      return view('404');
    }
    $lPagination = $this->paginator->paginateItems(
      $lStore->customers,
      ($request->page ? $request->page : 1)
    );
    if ($request->ajax()) {
      return $lPagination['items'];
    }
    if ($lPagination) {
      return view('customers.index', [
        'customers' => $lPagination['items'],
        'current' => $lPagination['current'],
        'pages' => $lPagination['pages']
      ]);
    }
    return view('404');
  }
  public function getSalesIndex(Request $request, $id) {
    $lStore = $this->storesService->get($id);
    if (!$lStore) {
      return view('404');
    }
    $lPagination = $this->paginator->paginateItems(
      $lStore->sales,
      ($request->page ? $request->page : 1)
    );
    if ($request->ajax()) {
      return $lPagination['items'];
    }
    if ($lPagination) {
      return view('sales.index', [
        'sales' => $lPagination['items'],
        'current' => $lPagination['current'],
        'pages' => $lPagination['pages']
      ]);
    }
    return view('404');
  }
  public function create() {
    return view('stores.submit', ['title' => 'Create store']);
  }
  public function store(CreateStoresRequest $request) {
    return $this->storesService->create($request->all());
  }
  public function edit($id) {
    $lStore = $this->storesService->get($id);
    if ($lStore == null) {
      return view('404');
    }
    return view('stores.submit', [
      'title' => 'Edit store',
      'store' => $lStore
    ]);
  }
  public function update(CreateStoresRequest $request, $id) {
    return $this->storesService->update($id, $request->all());
  }
  public function destroy($id) {
    return $this->storesService->delete($id);
  }
  public function batchDestroy(Request $request) {
    return $this->storesService->batchDelete($request->all());
  }
}
