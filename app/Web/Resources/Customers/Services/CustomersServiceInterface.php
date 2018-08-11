<?php

namespace LaravelStores\Web\Resources\Customers\Services;

interface CustomersServiceInterface {
    function create($data);
    function get($id);
    function getPage($page);
    function getPagesCount();
    function update($id, $data);
    function delete($id);
}