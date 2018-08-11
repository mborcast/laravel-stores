<?php 

namespace LaravelStores\Web\Resources\Customers\Repositories;
use LaravelStores\Web\Resources\Customers\Customer;
use LaravelStores\Web\Shared\ResourceRepository;

class CustomersRepository extends ResourceRepository implements CustomersRepositoryInterface {
    public function create($data) {
        return Customer::create([
        ]);
    }
    public function get($id) {
        return Customer::find($id);
    }
    public function update($id, $data) {
        $lCustomer = Customer::find($id);
        if ($lCustomer != null) {
            $lCustomer->save();
        }
        return $lCustomer;
    }
    public function delete($id) {
        return (Customer::destroy($id) > 0);
    }
    public function getByPage($page) {
        return Customer::skip($this->itemsPerPage * ($page - 1))
        ->take($this->itemsPerPage)
        ->with('sales.store')
        ->get();
    }
    public function getPagesCount() {
      return $this->calculateTotalPages(Customer::count());
    }
}