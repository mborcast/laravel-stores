$(document).ready(function() {
  console.log('pagination ready');
});

function paginate(page) {
  $.ajax({
    url: '?page='+page,
    type: "GET"
  })
  .done(function(data) {
    console.log(data);
  })
  .fail(function(jqXHR, ajaxOptions, thrownError) {
    console.log('No response from server', thrownError);
  });
}