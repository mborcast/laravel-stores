<?php

namespace LaravelStores\Web\Resources\Sales\Repositories;

interface SalesRepositoryInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}