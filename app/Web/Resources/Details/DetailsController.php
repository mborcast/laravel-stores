<?php

namespace LaravelDetails\Web\Resources\Details;

use LaravelDetails\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDetails\Web\Resources\Details\Services\DetailsServiceInterface;

class DetailsController extends Controller {
    private $_detailsService;

    public function __construct(DetailsServiceInterface $salesService) {
        $this->_detailsService = $salesService;
    }
    public function index() {
        return view('welcome');
    }
}
