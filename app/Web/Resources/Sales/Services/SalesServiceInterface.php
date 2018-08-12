<?php

namespace LaravelStores\Web\Resources\Sales\Services;

interface SalesServiceInterface {
    function create($data);
    function get($id);
    function getPage($page);
    function getItemsInPage($page);
    function update($id, $data);
    function delete($id);
    function batchDelete($data);
}