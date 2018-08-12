var deleteButton;
function destroy(button) {
  deleteButton = $(button);
  swal({
    title: 'Delete item?',
    text: 'Deleted items cannot be recovered.',
    icon: 'warning',
    buttons: {
      cancel: true,
      delete: true
    }
  }).then((value) => {
    if (value) {
      deleteItem();
    }
  });
}
function deleteItem() {
  $.ajax({
    type: "DELETE"
  })
  .done((data) => {
    deleteButton.attr('disabled', 'disabled');
    swal({
      icon: 'success',
      text: 'Item deleted successfully.'
    }).then(() => {
      location.href = deleteButton.data('index');
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