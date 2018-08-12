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
          <input type="text" placeholder="Search store name..." data-endpoint="{{ route('stores-search')}}">
          <ul class="list"></ul>
        </div>
        <div class="selectable products">
          <input type="text" placeholder="Search product name..." data-endpoint="{{ route('products-search')}}">
          <ul class="list"></ul>
        </div>
        <div class="selectable customers">
          <input type="text" placeholder="Search customer name..." data-endpoint="{{ route('customers-search')}}">
          <ul class="list"></ul>
        </div>
        <div>
          <input type="date" placeholder="Sale name" name="date" value="{{ isset($sale) ? $sale->date : '' }}" required>
        </div>
        <div>
          <input type="number" placeholder="Product units" name="units" value="{{ isset($sale) ? $sale->details->units : '' }}" required>
        </div>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($sale) ? route('sales-update', $sale->id) : route('sales-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($sale) ? asset('js/update.js') : asset('js/create.js')}}"></script>
<script>
var storesList, storesSearch;
var productsList, productsSearch;
var customersList, customersSearch;

$(document).ready(function() {
  storesList = $('.selectable.stores .list');
  storesSearch = $('.selectable.stores input');
  productsList = $('.selectable.products .list');
  productsSearch = $('.selectable.products input');
  customersList = $('.selectable.customers .list');
  customersSearch = $('.selectable.customers input');
  
  storesSearch.on('input', function() {
    searchStores($(this).data('endpoint'), $(this).val());
  });
  storesSearch.focusin(function() {
    storesList.show();
  });

  productsSearch.on('input', function() {
    searchProducts($(this).data('endpoint'), $(this).val());
  });
  productsSearch.focusin(function() {
    productsList.show();
  });

  customersSearch.on('input', function() {
    searchCustomers($(this).data('endpoint'), $(this).val());
  });
  customersSearch.focusin(function() {
    customersList.show();
  });
});
function setStore(id, name) {
  $('#store-id-input').val(id);
  storesSearch.val(name)
  storesList.hide();
}
function setProduct(id, name) {
  $('#product-id-input').val(id);
  productsSearch.val(name)
  productsList.hide();
}
function setCustomer(id, name) {
  $('#customer-id-input').val(id);
  customersSearch.val(name)
  customersList.hide();
}
function searchStores(endpoint, name) {
  $.ajax({
    url: endpoint +'?name='+name,
    type: "GET"
  })
  .done((data) => {
    storesList.html('');
    data.forEach((d) => {
      storesList.append('<li onclick="setStore('+d.id+',\''+d.name+'\')">'+d.name+'</li>');
    });
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {})
}
function searchProducts(endpoint, name) {
  $.ajax({
    url: endpoint +'?name='+name,
    type: "GET"
  })
  .done((data) => {
    productsList.html('');
    data.forEach((d) => {
      productsList.append('<li onclick="setProduct('+d.id+',\''+d.name+'\')">'+d.name+'</li>');
    });
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {})
}
function searchCustomers(endpoint, name) {
  $.ajax({
    url: endpoint +'?name='+name,
    type: "GET"
  })
  .done((data) => {
    customersList.html('');
    data.forEach((d) => {
      customersList.append('<li onclick="setCustomer('+d.id+',\''+d.name+'\')">'+d.name+'</li>');
    });
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {})
}
</script>
@endsection


