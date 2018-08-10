<?php

namespace LaravelStores\Web\Resources\Stores\Repositories;

interface StoresRepositoryInterface {
    function create($data);
    function get($id);
    function update($id, $data);
    function delete($id);
    function getPagesCount();
}