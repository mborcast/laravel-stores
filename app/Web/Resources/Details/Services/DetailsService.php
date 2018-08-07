<?php

namespace LaravelStores\Web\Resources\Details\Services;

use LaravelStores\Web\Resources\Details\Repositories\DetailsRepositoryInterface;

class DetailsService implements DetailsServiceInterface {

    private $_details;

    public function __construct(DetailsRepositoryInterface $salesRepository) {
        $this->_details = $salesRepository;
    }    
    public function create($data) {
        return response()->json(
            $this->_details->create($data),
            201
        );
    }
    public function get($id) {
        $lDetail = $this->_details->get($id);
        if ($lDetail == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lDetail,
            200
        );
    }
    public function getAll() {
        return response()->json(
            $this->_details->getAll(), 
            200
        );
    }
    public function update($data, $id) {
        $lDetail = $this->_details->update($data, $id);
        if ($lDetail == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        return response()->json(
            $lDetail,
            200
        );
    }
    public function delete($id) {
        $lDetail = $this->_details->get($id);
        if ($lDetail == null) {
            return response()->json(
                ['message' => 'Not found'], 
                404
            );
        }
        if ($this->_details->delete($id)) {
            return response()->json(
                null, 
                204
            );
        }
        return response()->json(
            ['message' => 'Deletion failed'], 
            500
        );
    }
}
