<?php

namespace LaravelStores\Web\Shared;

class RelationshipsPaginator {
  private $pageCalculator;
  public function __construct(PageCalculator $pageCalculator) {
    $this->pageCalculator = $pageCalculator;
  }
  public function paginateItems($items, $page) {
    $lItemsCount = count($items);
    $lPivotIdx = $this->pageCalculator->getSkipIndex($page);
    
    if ($lPivotIdx >= $lItemsCount) {
      return null;
    }
    return [
      'items' => $items->slice($lPivotIdx, $this->pageCalculator->getMaxItemsPerPage())->values(),
      'pages' => $this->pageCalculator->calculateMaxPages($lItemsCount),
      'current' => $page
    ];
  }
}