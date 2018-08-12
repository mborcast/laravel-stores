var form;

$(document).ready(function() {
  console.log('create.js')
  form = $('.submit-form');
  $('.submit-form .submit').click(function(e) {
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
    form.find("input[type=text], input[type=number], input[type=date], textarea").val("");
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {
    console.log(jqXHR.responseText);
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