<?php

namespace LaravelStores\Web\Resources\Sales\Requests;
use LaravelStores\Http\Requests\FormRequest;

class CreateSalesRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'date' => 'required|date',
      'units' => 'required|numeric',
      'storeId' => 'required|numeric',
      'customerId' => 'required|numeric',
      'productId' => 'required|numeric'
    ];
  }
}