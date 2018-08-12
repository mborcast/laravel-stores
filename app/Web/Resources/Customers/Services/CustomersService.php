<?php

namespace LaravelStores\Web\Resources\Customers\Services;

use LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface;
use LaravelStores\Web\Resources\Customers\Repositories\CustomersRepositoryInterface;

class CustomersService implements CustomersServiceInterface {

    private $customers;

    public function __construct(CustomersRepositoryInterface $customersRepository) {
        $this->customers = $customersRepository;
    }    
    public function create($data) {
      return $this->customers->create($data);
    }
    public function searchByName($name) {
      return $this->customers->searchByName($name);
    }
    public function get($id) {
      return $this->customers->get($id);
    }
    public function getItemsInPage($page) {
      return $this->customers->getByPage($page);
    }
    public function getPage($page) {
      $lMaxPages = $this->customers->getPagesCount();
      if ($page > $lMaxPages) {
        return null;
      }
      return [
        'customers' => $this->getItemsInPage($page),
        'pages' => $lMaxPages,
        'current' => $page
      ];
    }
    public function update($id, $data) {
      return $this->customers->update($id, $data);
    }
    public function delete($id) {
      if ($this->customers->delete($id)) {
        return response()->json(null, 204);
      }
      return response()->json(
        ['message' => 'Item deletion failed. Try again later.'], 
        500 
      );
    }
}
