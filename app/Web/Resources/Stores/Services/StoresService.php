<?php

namespace LaravelStores\Web\Resources\Stores\Services;

use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Stores\Repositories\StoresRepositoryInterface;
use LaravelStores\Web\Shared\ResourceRepository;

class StoresService implements StoresServiceInterface {

    private $_stores;

    public function __construct(StoresRepositoryInterface $storesRepository) {
        $this->_stores = $storesRepository;
    }    
    public function create($data) {
      return $this->_stores->create($data);
    }
    public function get($id) {
        return $this->_stores->get($id);
    }
    public function getPage($page) {
        return $this->_stores->getByPage($page);
    }
    public function getPagesCount() {
        return $this->_stores->getPagesCount();
    }
    public function update($id, $data) {
        return $this->_stores->update($id, $data);
    }
    public function delete($id) {
      if ($this->_stores->delete($id)) {
        return response()->json(null, 204);
      }
      return response()->json(
        ['message' => 'Item deletion failed. Try again later.'], 
        500 
      );
    }
}
