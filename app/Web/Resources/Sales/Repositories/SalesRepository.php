<?php 

namespace LaravelStores\Web\Resources\Sales\Repositories;
use LaravelStores\Web\Resources\Sales\Sale;

class SalesRepository implements SalesRepositoryInterface {
    public function create($data) {
        return Sale::create([
        ]);
    }
    public function get($id) {
        return Sale::find($id);
    }
    public function getAll() {
        return Sale::all();
    }
    public function update($id, $data) {
        $lSale = Sale::find($id);
        if ($lSale != null) {
            $lSale->save();
        }
        return $lSale;
    }
    public function delete($id) {
        return (Sale::destroy($id) > 0);
    }
}