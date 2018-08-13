var form;

$(document).ready(function() {
  form = $('.submit-form');
  resetForm();
  $('.submit-form .submit').click(function(e) {
    e.preventDefault();
    create($(this).data('endpoint'));
  });
});
function resetForm() {
  form.find("input[type=text], input[type=number], input[type=date], textarea").val("");
}
function create(endpoint) {
  $.ajax({
    url: endpoint,
    type: "POST",
    data: form.serialize()
  })
  .done((data) => {
    swal({
      icon: 'success',
      text: 'Item created successfully.',
      buttons: {
        createNew: {
          text: 'Create another',
          value: false
        },
        checkNew: {
          text: 'Go to created',
          className: 'button primary',
          value: true
        }
      }
    }).then((goToNew) => {
      if (goToNew) {
        window.location = endpoint + '/' + data.id;
      }
      else {
        resetForm();
      }
    });
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