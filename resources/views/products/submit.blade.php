@extends('layout', ['title' => $title])
@section('content')

<div class="container">
  <form class="submit-form">
    <fieldset>
      <legend><span><i class="fas fa-box-open"></i></span>{{$title}}</legend>
      <div>
        <label>Product name</label>
        <input type="text" placeholder="Product name" name="name" value="{{ isset($product) ? $product->name : '' }}" required>
      </div>
      <div>
        <label>Product price</label>
        <input type="number" placeholder="Product price" name="price" value="{{ isset($product) ? $product->price : '' }}" required>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($product) ? route('stores-update', $product->id) : route('products-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($product) ? asset('js/update.js') : asset('js/create.js')}}"></script>
@endsection


