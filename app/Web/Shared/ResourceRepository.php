<?php

namespace LaravelStores\Web\Shared;

abstract class ResourceRepository {
    protected $itemsPerPage = 5;
    public abstract function getByPage($page);
}