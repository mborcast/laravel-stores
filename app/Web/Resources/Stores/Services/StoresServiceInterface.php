<?php

namespace LaravelStores\Web\Resources\Stores\Services;

interface StoresServiceInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}