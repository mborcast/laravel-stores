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
    public function index(Request $request) {
        $lStores = $this->_storesService->getPage($request->page ? $request->page : 1);
        if ($request->ajax()) {
            return $lStores;
        }
        return view('stores.index', [
            'stores' => $lStores,
            'pages' => $this->_storesService->getPagesCount()
        ]);
    }
    public function find($id) {
        return $this->_storesService->get($id);
    }
}
