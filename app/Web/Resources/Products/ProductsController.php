<?php

namespace LaravelStores\Web\Resources\Products;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface;
use LaravelStores\Web\Shared\RelationshipsPaginator;
use LaravelStores\Web\Resources\Products\Requests\CreateProductsRequest;

class ProductsController extends Controller {
  private $productsService;
  private $paginator;

  public function __construct(
    ProductsServiceInterface $productsService,
    RelationshipsPaginator $paginator) {
      $this->productsService = $productsService;
      $this->paginator = $paginator;
  }
  public function index(Request $request) {
    $lPage = $this->productsService->getPage(($request->page ? $request->page : 1));
    if ($request->ajax()) {
      return $lPage['products'];
    }
    if ($lPage) {
      return view('products.index', $lPage);
    }
    return view('404');
  }
  public function find($id) {
    $lProduct = $this->productsService->get($id);
    if ($lProduct) {
      return view('products.about', ['product' => $lProduct]);
    }
    return view('404');
  }
  public function getSalesIndex(Request $request, $id) {
    $lProduct = $this->productsService->get($id);
    if (!$lProduct) {
      return view('404');
    }
    $lPagination = $this->paginator->paginateItems(
      $lProduct->sales,
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
    return view('products.submit', ['title' => 'Create product']);
  }
  public function store(CreateProductsRequest $request) {
    return $this->productsService->create($request->all());
  }
  public function edit($id) {
    $lProduct = $this->productsService->get($id);
    if ($lProduct == null) {
      return view('404');
    }
    return view('products.submit', [
      'title' => 'Edit product',
      'product' => $lProduct
    ]);
  }
  public function update(CreateProductsRequest $request, $id) {
    return $this->productsService->update($id, $request->all());
  }
  public function destroy($id) {
    return $this->productsService->delete($id);
  }
}
