<?php

namespace LaravelStores\Web\Resources\Products\Repositories;

interface ProductsRepositoryInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}