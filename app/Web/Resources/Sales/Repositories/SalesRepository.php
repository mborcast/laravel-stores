<?php 

namespace LaravelStores\Web\Resources\Sales\Repositories;
use LaravelStores\Web\Resources\Sales\Sale;
use LaravelStores\Web\Shared\ResourceRepository;
use LaravelStores\Web\Shared\PageCalculator;

class SalesRepository implements SalesRepositoryInterface {
  private $pageCalculator;

  public function __construct(PageCalculator $pageCalculator) {
    $this->pageCalculator = $pageCalculator;
  }
  public function create($data) {
    return Sale::create([
      'date' => $data['date'],
      'store_id' => $data['storeId'],
      'customer_id' => $data['customerId']
    ]);
  }
  public function get($id) {
    return Sale::with('store', 'customer', 'products')
    ->find($id);
  }
  public function update($id, $data) {
    $lProduct = Sale::find($id);
    if ($lProduct != null) {
      $lProduct->date = $data['date'];
      $lProduct->store_id = $data['storeId'];
      $lProduct->customer_id = $data['customerId'];
      $lProduct->save();
    }
    return $lProduct;
  }
  public function delete($id) {
    return (Sale::destroy($id) > 0);
  }
  public function getByPage($page) {
    return Sale::skip($this->pageCalculator->getSkipIndex($page))
    ->take($this->pageCalculator->getMaxItemsPerPage())
    ->with('store', 'customer', 'products')
    ->orderBy('date', 'desc')
    ->get();
  }
  public function getPagesCount() {
    return $this->pageCalculator->calculateMaxPages(Sale::count());
  }
}