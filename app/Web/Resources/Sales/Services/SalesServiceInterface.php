<?php

namespace LaravelStores\Web\Resources\Sales\Services;

interface SalesServiceInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}