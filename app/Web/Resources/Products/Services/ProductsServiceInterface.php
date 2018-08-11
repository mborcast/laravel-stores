<?php

namespace LaravelStores\Web\Resources\Products\Services;

interface ProductsServiceInterface {
    function create($data);
    function get($id);
    function getPage($page);
    function getPagesCount();
    function update($id, $data);
    function delete($id);
}