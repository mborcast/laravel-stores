<?php

namespace LaravelStores\Web\Shared;

class RelationshipsPaginator {
  private $paginator;
  public function __construct(ResourcePaginator $paginator) {
    $this->paginator = $paginator;
  }
  public function paginateItems($items, $page) {
    $lItemsCount = count($items);
    $lPivotIdx = $this->paginator->getSkipIndex($page);
    
    if ($lPivotIdx >= $lItemsCount) {
      return null;
    }
    return [
      'items' => $items->slice($lPivotIdx, $this->paginator->getMaxItemsPerPage())->values(),
      'pages' => $this->paginator->calculateMaxPages($lItemsCount),
      'current' => $page
    ];
  }
}