@extends('layout', ['title' => $title])
@section('content')

<div class="container">
  <form class="submit-form">
    <fieldset>
      <legend><span><i class="fas fa-box-open"></i></span>{{$title}}</legend>
      <input id="store-id-input" type="hidden" name="storeId">
      <input id="product-id-input" type="hidden" name="productId">
      <input id="customer-id-input" type="hidden" name="customerId">
      <div class="x-x">
        <div class="selectable stores">
          <label>Store</label>
          <input type="text" placeholder="Search store name..." data-endpoint="{{ route('stores-search')}}">
          <ul class="list"></ul>
        </div>
        <div class="selectable products">
          <label>Product</label>
          <input type="text" placeholder="Search product name..." data-endpoint="{{ route('products-search')}}">
          <ul class="list"></ul>
        </div>
        <div class="selectable customers">
          <label>Customer</label>
          <input type="text" placeholder="Search customer name..." data-endpoint="{{ route('customers-search')}}">
          <ul class="list"></ul>
        </div>
        <div>
          <label>Date</label>
          <input type="date" placeholder="Sale name" name="date" value="{{ isset($sale) ? $sale->date : '' }}" required>
        </div>
        <div>
          <label>Product units</label>
          <input type="number" placeholder="Product units" name="units" min="1" max="999" value="{{ isset($sale) ? $sale->details->units : '' }}" required>
        </div>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($sale) ? route('sales-update', $sale->id) : route('sales-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($sale) ? asset('js/update.js') : asset('js/create.js')}}"></script>
<script src="{{ asset('js/sales-select.js') }}"></script>
@endsection


