<?php 

namespace LaravelStores\Web\Resources\Products\Repositories;
use LaravelStores\Web\Resources\Products\Product;
use LaravelStores\Web\Shared\ResourceRepository;

class ProductsRepository extends ResourceRepository implements ProductsRepositoryInterface {
    public function create($data) {
        return Product::create([
        ]);
    }
    public function get($id) {
        return Product::find($id);
    }
    public function update($id, $data) {
        $lProduct = Product::find($id);
        if ($lProduct != null) {
            $lProduct->save();
        }
        return $lProduct;
    }
    public function delete($id) {
        return (Product::destroy($id) > 0);
    }
    public function getByPage($page) {
        return Product::skip($this->itemsPerPage * ($page - 1))
        ->take($this->itemsPerPage)
        ->with('sales.store')
        ->get();
    }
    public function getPagesCount() {
      return $this->calculateMaxPages(Product::count());
    }
}