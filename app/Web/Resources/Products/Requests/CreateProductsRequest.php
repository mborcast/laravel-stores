<?php

namespace LaravelStores\Web\Resources\Products\Requests;
use LaravelStores\Http\Requests\FormRequest;

class CreateProductsRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'name' => 'required',
      'price' => 'required|numeric'
    ];
  }
}