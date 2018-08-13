<?php 

namespace LaravelStores\Web\Resources\Stores\Repositories;
use LaravelStores\Web\Resources\Stores\Store;
use LaravelStores\Web\Shared\PageCalculator;

class StoresRepository implements StoresRepositoryInterface {
  private $pageCalculator;

  public function __construct(PageCalculator $pageCalculator) {
    $this->pageCalculator = $pageCalculator;
  }
  public function create($data) {
    return Store::create([
      'name' => $data['name']
    ]);
  }
  public function searchByName($name) {
    return Store::where('name', 'like', $name.'%')
    ->orderBy('name', 'asc')
    ->get();
  }
  public function get($id) {
    return Store::with('customers.sales', 'sales.products')->find($id);
  }
  public function update($id, $data) {
    $lStore = Store::find($id);
    if ($lStore != null) {
      $lStore->name = $data['name'];
      $lStore->save();
    }
    return $lStore;
  }
  public function delete($id) {
    return (Store::destroy($id) > 0);
  }
  public function getByPage($page) {
    return Store::skip($this->pageCalculator->getSkipIndex($page))
    ->take($this->pageCalculator->getMaxItemsPerPage())
    ->with('customers.sales', 'sales.products')
    ->orderBy('name', 'asc')
    ->get();
  }
  public function getPagesCount() {
    return $this->pageCalculator->calculateMaxPages(Store::count());
  }
}