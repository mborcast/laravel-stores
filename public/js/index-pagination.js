$(document).ready(function() {
  $('.paginator-item').click(function() {
    selectLinkItem($(this));
    paginatePageInto($(this));
  });
});
function selectLinkItem(element) {
  $('.paginator-item').removeClass('active');
  element.addClass('active');
}
function displayDataInto(data, container) {
  container.html('');
  data.forEach((d) => {
    container.append(build(d));
  });
}
function paginatePageInto(linkItem) {
  var lSearch = '?page='+linkItem.attr('data-page');
  $.ajax({
    url: lSearch,
    type: "GET"
  })
  .done((data) => {
    displayDataInto(data, $('.'+linkItem.attr('data-container')))
    history.replaceState(null, '', window.location.pathname+lSearch)
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {
    console.log('No response from server', thrownError)
  })
}