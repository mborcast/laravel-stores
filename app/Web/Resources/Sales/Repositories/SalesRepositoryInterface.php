<?php

namespace LaravelStores\Web\Resources\Sales\Repositories;

interface SalesRepositoryInterface {
    function create($data);
    function get($id);
    function update($id, $data);
    function delete($id);
    function getPagesCount();
}