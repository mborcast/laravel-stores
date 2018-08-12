<?php

namespace LaravelStores\Web\Resources\Customers\Requests;
use LaravelStores\Http\Requests\FormRequest;

class CreateCustomersRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
          'name' => 'required'
        ];
    }
}