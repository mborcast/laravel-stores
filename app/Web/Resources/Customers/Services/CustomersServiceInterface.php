<?php

namespace LaravelStores\Web\Resources\Customers\Services;

interface CustomersServiceInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}