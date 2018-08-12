<?php

namespace LaravelStores\Web\Resources\Customers;

use Illuminate\Http\Request;
use LaravelStores\Http\Controllers\Controller;
use LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface;
use LaravelStores\Web\Shared\RelationshipsPaginator;
use LaravelStores\Web\Resources\Customers\Requests\CreateCustomersRequest;

class CustomersController extends Controller {
  private $customersService;
  private $paginator;

  public function __construct(
    CustomersServiceInterface $customersService, 
    RelationshipsPaginator $paginator) {
    $this->customersService = $customersService;
    $this->paginator = $paginator;
  }
  public function index(Request $request) {
    $lPage = $this->customersService->getPage(($request->page ? $request->page : 1));
    if ($request->ajax()) {
      return $lPage['customers'];
    }
    if ($lPage) {
      return view('customers.index', $lPage);
    }
    return view('404');
  }
  public function find($id) {
    $lCustomer = $this->customersService->get($id);
    if ($lCustomer) {
      return view('customers.about', ['customer' => $lCustomer]);
    }
    return view('404');
  }
  public function search(Request $request) {
    if ($request->ajax()) {
     return $this->customersService->searchByName($request->name);
    }
  }
  public function getSalesIndex(Request $request, $id) {
    $lCustomer = $this->customersService->get($id);
    if (!$lCustomer) {
      return view('404');
    }
    $lPagination = $this->paginator->paginateItems(
      $lCustomer->sales,
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
    return view('customers.submit', ['title' => 'Create customer']);
  }
  public function store(CreateCustomersRequest $request) {
    return $this->customersService->create($request->all());
  }
  public function edit($id) {
    $lCustomer = $this->customersService->get($id);
    if ($lCustomer == null) {
      return view('404');
    }
    return view('customers.submit', [
      'title' => 'Edit customer',
      'customer' => $lCustomer
    ]);
  }
  public function update(CreateCustomersRequest $request, $id) {
    return $this->customersService->update($id, $request->all());
  }
  public function destroy($id) {
    return $this->customersService->delete($id);
  }
}
