<?php 

namespace LaravelStores\Web\Resources\Products\Repositories;

use LaravelStores\Product;

class ProductsRepository implements ProductsRepositoryInterface {
    public function create($data) {
        return Product::create([
        ]);
    }
    public function get($id) {
        return Product::find($id);
    }
    public function getAll() {
        return Product::all();
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
}