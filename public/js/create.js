var form;

$(document).ready(function() {
  form = $('.create-form');
  $('.create-form .submit').click(function(e) {
    e.preventDefault();
    create($(this).data('endpoint'));
  });
});

function create(endpoint) {
  $.ajax({
    url: endpoint,
    type: "POST",
    data: form.serialize()
  })
  .done((data) => {
    swal({
      icon: 'success',
      text: 'Item created successfully.'
    });
    form.find("input[type=text], textarea").val("");
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