<?php

namespace LaravelStores\Web\Resources\Stores;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface;

class StoresController extends Controller {
    private $_storesService;

    public function __construct(StoresServiceInterface $storesService) {
        $this->_storesService = $storesService;
    }
    public function index() {
        return $this->_storesService->getAll();
    }
    public function find($id) {
        return $this->_storesService->get($id);
    }
}
