<?php 

namespace LaravelStores\Web\Resources\Stores\Repositories;
use LaravelStores\Web\Resources\Stores\Store;

class StoresRepository implements StoresRepositoryInterface {
    public function create($data) {
        return Store::create([
        ]);
    }
    public function get($id) {
        return Store::find($id);
    }
    public function getAll() {
        return Store::all();
    }
    public function update($id, $data) {
        $lStore = Store::find($id);
        if ($lStore != null) {
            $lStore->save();
        }
        return $lStore;
    }
    public function delete($id) {
        return (Store::destroy($id) > 0);
    }
}