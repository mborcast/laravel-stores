<?php

namespace LaravelStores\Web\Resources\Products\Repositories;

interface ProductsRepositoryInterface {
    function create($data);
    function searchByName($name);
    function get($id);
    function update($id, $data);
    function delete($id);
    function getPagesCount();
}