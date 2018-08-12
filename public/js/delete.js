function destroy(button) {
  $.ajax({
    type: "DELETE"
  })
  .done((data) => {
    $(button).attr('disabled', 'disabled');
    swal({
      icon: 'success',
      text: 'Item deleted successfully.'
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