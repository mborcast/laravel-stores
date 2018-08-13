<?php 

namespace LaravelStores\Web\Resources\Customers\Repositories;
use LaravelStores\Web\Resources\Customers\Customer;
use LaravelStores\Web\Shared\PageCalculator;

class CustomersRepository implements CustomersRepositoryInterface {
  private $pageCalculator;

  public function __construct(PageCalculator $pageCalculator) {
    $this->pageCalculator = $pageCalculator;
  }
  public function create($data) {
    return Customer::create([
      'name' => $data['name']
    ]);
  }
  public function searchByName($name) {
    return Customer::where('name', 'like', $name.'%')->get();
  }
  public function get($id) {
    return Customer::with('sales.store', 'sales.products')
    ->orderBy('name', 'asc')
    ->find($id);
  }
  public function update($id, $data) {
    $lCustomer = Customer::find($id);
    if ($lCustomer != null) {
      $lCustomer->name = $data['name'];
      $lCustomer->save();
    }
    return $lCustomer;
  }
  public function delete($id) {
    return (Customer::destroy($id) > 0);
  }
  public function getByPage($page) {
    return Customer::skip($this->pageCalculator->getSkipIndex($page))
    ->take($this->pageCalculator->getMaxItemsPerPage())
    ->with('sales.store')
    ->orderBy('name', 'asc')
    ->get();
  }
  public function getPagesCount() {
    return $this->pageCalculator->calculateMaxPages(Customer::count());
  }
}