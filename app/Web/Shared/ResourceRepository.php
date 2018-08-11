<?php

namespace LaravelStores\Web\Shared;

abstract class ResourceRepository {
    protected $itemsPerPage = 10;
    protected function calculateTotalPages($totalItems) {
      if ($totalItems <= 0) {
        return 1;
      }
      return (int)ceil($totalItems / $this->itemsPerPage);
    }
    public abstract function getByPage($page);
}