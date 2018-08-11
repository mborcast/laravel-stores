<?php 

namespace LaravelStores\Web\Resources\Sales\Repositories;
use LaravelStores\Web\Resources\Sales\Sale;
use LaravelStores\Web\Shared\ResourceRepository;

class SalesRepository extends ResourceRepository implements SalesRepositoryInterface {
    public function create($data) {
        return Sale::create([
        ]);
    }
    public function get($id) {
        return Sale::with('store', 'customer', 'products')
        ->find($id);
    }
    public function update($id, $data) {
        $lSale = Sale::with('store', 'customer', 'products')
        ->find($id);
        if ($lSale != null) {
            $lSale->save();
        }
        return $lSale;
    }
    public function delete($id) {
        return (Sale::destroy($id) > 0);
    }
    public function getByPage($page) {
        return Sale::skip($this->itemsPerPage * ($page - 1))
        ->take($this->itemsPerPage)
        ->with('store', 'customer', 'products')
        ->get();
    }
    public function getPagesCount() {
      return $this->calculateTotalPages(Sale::count());
    }
}