var form;

$(document).ready(function() {
  form = $('.submit-form');
  $('.submit-form .submit').click(function(e) {
    e.preventDefault();
    create($(this).data('endpoint'));
  });
});

function create(endpoint) {
  $.ajax({
    url: endpoint,
    type: "PUT",
    data: form.serialize()
  })
  .done((data) => {
    console.log(data);
    swal({
      icon: 'success',
      text: 'Item updated successfully.'
    });
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {
    var lResponse = jqXHR.responseJSON;
    var lErrors = document.createElement('div');

    Object.keys(lResponse).forEach(
      (key) => {
        lErrors.innerHTML += '<p>'+lResponse[key]+'</p>';
      }
    )
    swal({
      icon: 'error',
      content: lErrors
    });
  })
}