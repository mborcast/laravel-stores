<?php

namespace LaravelStores\Web\Resources\Customers\Repositories;

interface CustomersRepositoryInterface {
    function create($data);
    function get($id);
    function update($id, $data);
    function delete($id);
    function getPagesCount();
}