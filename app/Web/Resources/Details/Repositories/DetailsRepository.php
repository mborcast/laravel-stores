<?php 

namespace LaravelStores\Web\Resources\Details\Repositories;
use LaravelStores\Web\Resources\Details\Detail; 

class DetailsRepository implements DetailsRepositoryInterface {
    public function create($data) {
      return Detail::create([
        'sale_id' => $data['saleId'],
        'product_id' => $data['productId'],
        'units' => $data['units']
      ]);
    }
    public function get($id) {
        return Detail::find($id);
    }
    public function getAll() {
        return Detail::all();
    }
    public function update($id, $data) {
        $lDetail = Detail::find($id);
        if ($lDetail != null) {
          $lDetail->sale_id = $data['saleId'];
          $lDetail->product_id = $data['productId'];
          $lDetail->units = $data['units'];
          $lDetail->save();
        }
        return $lDetail;
    }
    public function delete($id) {
        return (Detail::destroy($id) > 0);
    }
}