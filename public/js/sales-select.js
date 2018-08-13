
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
      productsList.append('<li onclick="setProduct('+d.id+',\''+(d.name).replace(/'/g, "\\'")+'\')">'+d.name+'</li>');
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