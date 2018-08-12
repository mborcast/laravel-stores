<?php

namespace LaravelStores\Web\Resources\Stores\Services;

interface StoresServiceInterface {
    function create($data);
    function searchByName($name);
    function get($id);
    function getPage($page);
    function getItemsInPage($page);
    function update($id, $data);
    function delete($id);
}