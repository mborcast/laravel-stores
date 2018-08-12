<?php

namespace LaravelStores\Web\Resources\Stores\Requests;
use LaravelStores\Http\Requests\FormRequest;

class CreateStoresRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
          'name' => 'required'
        ];
    }
}