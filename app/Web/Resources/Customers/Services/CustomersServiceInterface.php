<?php

namespace LaravelStores\Web\Resources\Customers\Services;

interface CustomersServiceInterface {
    function create($data);
    function searchByName($name);
    function get($id);
    function getPage($page);
    function getItemsInPage($page);
    function update($id, $data);
    function delete($id);
}