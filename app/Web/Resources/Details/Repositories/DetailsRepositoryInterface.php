<?php

namespace LaravelDetails\Web\Resources\Details\Repositories;

interface DetailsRepositoryInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}