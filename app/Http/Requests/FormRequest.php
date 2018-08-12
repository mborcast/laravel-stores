<?php

namespace LaravelStores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\JsonResponse;

abstract class FormRequest extends LaravelFormRequest
{
    abstract public function rules();
    public function response(array $errors) {
        $lMutated = array();
        foreach ($errors as $field => $message) {
            $lMutated[$field] = $message[0];
        }
        return response()->json($lMutated, 422);
    }
}