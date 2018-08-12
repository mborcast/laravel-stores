<?php

namespace LaravelStores\Web\Resources\Products\Services;

use LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface;
use LaravelStores\Web\Resources\Products\Repositories\ProductsRepositoryInterface;

class ProductsService implements ProductsServiceInterface {

    private $products;

    public function __construct(ProductsRepositoryInterface $productsRepository) {
        $this->products = $productsRepository;
    }    
    public function create($data) {
      return $this->products->create($data);
    }
    public function searchByName($name) {
      return $this->products->searchByName($name);
    }
    public function get($id) {
      return $this->products->get($id);
    }
    public function getItemsInPage($page) {
      return $this->products->getByPage($page);
    }
    public function getPage($page) {
      $lMaxPages = $this->products->getPagesCount();
      if ($page > $lMaxPages) {
        return null;
      }
      return [
        'products' => $this->getItemsInPage($page),
        'pages' => $lMaxPages,
        'current' => $page
      ];
    }
    public function update($data, $id) {
      return $this->products->update($id, $data);
    }
    public function delete($id) {
      if ($this->products->delete($id)) {
        return response()->json(null, 204);
      }
      return response()->json(
        ['message' => 'Item deletion failed. Try again later.'], 
        500 
      );
    }
}
