<?php

namespace LaravelStores\Web\Shared;

class ResourcePaginator {
  private $_itemsPerPage = 10;
  public function calculateTotalPages($totalItems) {
    return ($totalItems > 0) ? (int)ceil($totalItems / $this->_itemsPerPage) : 1;
  }
  public function getSkipIndex($page) {
    return $this->_itemsPerPage * ($page - 1);
  }
  public function getMaxItemsPerPage() {
    return $this->_itemsPerPage;
  }
}