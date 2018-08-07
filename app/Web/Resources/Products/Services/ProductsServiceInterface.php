<?php

namespace LaravelStores\Web\Resources\Products\Services;

interface ProductsServiceInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}