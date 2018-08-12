<?php

namespace LaravelStores\Web\Resources\Stores\Services;

use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;
use LaravelStores\Web\Resources\Stores\Repositories\StoresRepositoryInterface;
use LaravelStores\Web\Shared\ResourceRepository;

class StoresService implements StoresServiceInterface {

    private $stores;

    public function __construct(StoresRepositoryInterface $storesRepository) {
        $this->stores = $storesRepository;
    }    
    public function create($data) {
      return $this->stores->create($data);
    }
    public function get($id) {
        return $this->stores->get($id);
    }
    public function getItemsInPage($page) {
      return $this->stores->getByPage($page);
    }
    public function getPage($page) {
      $lPagesCount = $this->stores->getPagesCount();
      if ($page > $lPagesCount) {
        return view('404');
      }
      return view('stores.index', [
          'stores' => $this->getItemsInPage($page),
          'current' => $page,
          'pages' => $lPagesCount
      ]);
    }
    public function update($id, $data) {
        return $this->stores->update($id, $data);
    }
    public function delete($id) {
      if ($this->stores->delete($id)) {
        return response()->json(null, 204);
      }
      return response()->json(
        ['message' => 'Item deletion failed. Try again later.'], 
        500 
      );
    }
}
