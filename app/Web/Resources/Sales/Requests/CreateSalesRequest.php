<?php

namespace LaravelStores\Web\Resources\Sales\Requests;
use LaravelStores\Http\Requests\FormRequest;

class CreateSalesRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'name' => 'required'
    ];
  }
}