<?php 

namespace LaravelStores\Web\Resources\Customers\Repositories;
use LaravelStores\Web\Resources\Customers\Customer;

class CustomersRepository implements CustomersRepositoryInterface {
    public function create($data) {
        return Customer::create([
        ]);
    }
    public function get($id) {
        return Customer::find($id);
    }
    public function getAll() {
        return Customer::all();
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
}