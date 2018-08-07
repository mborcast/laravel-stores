<?php

namespace LaravelDetails\Web\Resources\Details\Services;

interface DetailsServiceInterface {
    function create($data);
    function get($id);
    function getAll();
    function update($id, $data);
    function delete($id);
}