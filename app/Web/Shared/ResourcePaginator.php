<?php

namespace LaravelStores\Web\Shared;

class ResourcePaginator {
  private const ITEMS_PER_PAGE = 6;
  public function calculateMaxPages($totalItems) {
    return ($totalItems > 0) ? (int)ceil($totalItems / self::ITEMS_PER_PAGE) : 1;
  }
  public function getSkipIndex($page) {
    return self::ITEMS_PER_PAGE * ($page - 1);
  }
  public function getMaxItemsPerPage() {
    return self::ITEMS_PER_PAGE;
  }
}