<?php

namespace LaravelStores\Web\Resources\Details;

use LaravelStores\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelStores\Web\Resources\Details\Services\DetailsServiceInterface;

class DetailsController extends Controller {
    private $_detailsService;

    public function __construct(DetailsServiceInterface $salesService) {
        $this->_detailsService = $salesService;
    }
    public function index() {
        return view('details.index');
    }
}
