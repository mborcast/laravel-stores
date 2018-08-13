<?php 

namespace LaravelStores\Web\Resources\Products\Repositories;
use LaravelStores\Web\Resources\Products\Product;
use LaravelStores\Web\Shared\PageCalculator;

class ProductsRepository implements ProductsRepositoryInterface {
  private $pageCalculator;

  public function __construct(PageCalculator $pageCalculator) {
    $this->pageCalculator = $pageCalculator;
  }
  public function create($data) {
    return Product::create([
      'name' => $data['name'],
      'price' => $data['price']
    ]);
  }
  public function searchByName($name) {
    return Product::where('name', 'like', $name.'%')
    ->orderBy('name', 'asc')
    ->get();
  }
  public function get($id) {
    return Product::with('sales.products')->find($id);
  }
  public function update($id, $data) {
    $lProduct = Product::find($id);
    if ($lProduct != null) {
      $lProduct->name = $data['name'];
      $lProduct->price = $data['price'];
      $lProduct->save();
    }
    return $lProduct;
  }
  public function delete($id) {
    return (Product::destroy($id) > 0);
  }
  public function getByPage($page) {
    return Product::skip($this->pageCalculator->getSkipIndex($page))
    ->take($this->pageCalculator->getMaxItemsPerPage())
    ->with('sales.store')
    ->orderBy('name', 'asc')
    ->get();
  }
  public function getPagesCount() {
    return $this->pageCalculator->calculateMaxPages(Product::count());
  }
}