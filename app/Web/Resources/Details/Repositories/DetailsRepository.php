<?php 

namespace LaravelDetails\Web\Resources\Details\Repositories;
use LaravelDetails\Web\Resources\Details\Detail;

class DetailsRepository implements DetailsRepositoryInterface {
    public function create($data) {
        return Detail::create([
        ]);
    }
    public function get($id) {
        return Detail::find($id);
    }
    public function getAll() {
        return Detail::all();
    }
    public function update($id, $data) {
        $lDetail = Detail::find($id);
        if ($lDetail != null) {
            $lDetail->save();
        }
        return $lDetail;
    }
    public function delete($id) {
        return (Detail::destroy($id) > 0);
    }
}