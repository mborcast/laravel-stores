<?php

namespace LaravelStores\Web\Resources\Stores\Services;

use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Stores\Repositories\StoresRepositoryInterface;

class StoresService implements StoresServiceInterface {

    private $_stores;

    public function __construct(StoresRepositoryInterface $storesRepository) {
        $this->_stores = $storesRepository;
    }    
    public function create($data) {
        return response()->json(
            $this->_stores->create($data),
            201
        );
    }
    public function get($id) {
        $lStore = $this->_stores->get($id);
        if ($lStore == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lStore,
            200
        );
    }
    public function getAll() {
        return response()->json(
            $this->_stores->getAll(), 
            200
        );
    }
    public function update($data, $id) {
        $lStore = $this->_stores->update($data, $id);
        if ($lStore == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lStore,
            200
        );
    }
    public function delete($id) {
        $lStore = $this->_stores->get($id);
        if ($lStore == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        if ($this->_stores->delete($id)) {
            return response()->json(
                null, 
                204
            );
        }
        return response()->json(
            ['message' => 'Deletion failed'], 
            500
        );
    }
}