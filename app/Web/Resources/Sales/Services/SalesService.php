<?php

namespace LaravelStores\Web\Resources\Sales\Services;

use LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface;
use LaravelStores\Web\Resources\Sales\Repositories\SalesRepositoryInterface;
use LaravelStores\Web\Resources\Details\Repositories\DetailsRepositoryInterface;

class SalesService implements SalesServiceInterface {
  private $sales;
  private $details;
  public function __construct(
    SalesRepositoryInterface $salesRepository,
    DetailsRepositoryInterface $detailsRepository) {
      $this->sales = $salesRepository;
      $this->details = $detailsRepository;
  }    
  public function create($data) {
    $lSale = $this->sales->create($data);
    return $this->details->create([
      'saleId' => $lSale->id,
      'productId' => $data['productId'],
      'units' => $data['units']
    ]);
    return $lSale->fresh();
  }
  public function get($id) {
    return $this->sales->get($id);
  }
  public function getItemsInPage($page) {
    return $this->sales->getByPage($page);
  }
  public function getPage($page) {
    $lMaxPages = $this->sales->getPagesCount();
    if ($page > $lMaxPages) {
      return null;
    }
    return [
      'sales' => $this->getItemsInPage($page),
      'pages' => $lMaxPages,
      'current' => $page
    ];
  }
  public function update($data, $id) {
    return $this->sales->update($id, $data);
  }
  public function delete($id) {
    if ($this->sales->delete($id)) {
      return response()->json(null, 204);
    }
    return response()->json(
      ['message' => 'Item deletion failed. Try again later.'], 
      500 
    );
  }
  public function batchDelete($data) {
    foreach ($data as $id) {
      $this->sales->delete($id);
    }
    return response()->json(null, 204);
  }
}
