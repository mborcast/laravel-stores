$(document).ready(function() {
  $('.link-item').click(function() {
    selectLinkItem($(this));
    paginatePageInto($(this));
  });
});
function selectLinkItem(element) {
  $('.link-item').removeClass('active');
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
    history.pushState(null, '', window.location.pathname+lSearch);
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {
    console.log('No response from server', thrownError)
  })
}