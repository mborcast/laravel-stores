<?php

namespace LaravelStores\Web\Resources\Products\Services;

interface ProductsServiceInterface {
    function create($data);
    function searchByName($name);
    function get($id);
    function getPage($page);
    function getItemsInPage($page);
    function update($id, $data);
    function delete($id);
}