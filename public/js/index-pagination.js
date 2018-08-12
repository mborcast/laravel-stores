var batchDeleteButton;
$(document).ready(function() {
  batchDeleteButton = $('.batch-destroyer');
  $('.paginator-item').click(function() {
    selectLinkItem($(this));
    paginatePageInto($(this));
  });
  $(batchDeleteButton).click(function() {
    batchDelete($(this));
  });
  $('.index-grid').change(function() {
    if ($('[type=checkbox]:checked').length > 0) {
      batchDeleteButton.removeAttr('disabled');
    }
    else {
      batchDeleteButton.attr('disabled', 'disabled');
    }
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
  var lSearch = '?page='+linkItem.data('page');
  $.ajax({
    url: lSearch,
    type: "GET"
  })
  .done((data) => {
    if (data.length > 0) {
      displayDataInto(data, $('.'+linkItem.data('container')))
      history.replaceState(null, '', window.location.pathname+lSearch)
    }
    else {
      var lPreviousPage = linkItem.data('page')-1;
      setTimeout(function () {
        window.location = window.location.pathname +'?page='+ ((lPreviousPage >= 1) ? lPreviousPage : 1);
      }, 1000);
    }
  })
  .fail((jqXHR, ajaxOptions, thrownError) => {
    console.log('No response from server', thrownError)
  })
}
function batchDelete() {
  swal({
    title: 'Delete items?',
    text: 'Deleted items cannot be recovered.',
    icon: 'warning',
    buttons: {
      cancel: true,
      delete: true
    }
  }).then((value) => {
    if (!value) {
      return;
    }
    $.ajax({
      url: batchDeleteButton.data('endpoint'),
      data: $('.index-grid').serialize(),
      type: "DELETE",
      beforeSend: () => {
        batchDeleteButton.attr('disabled', 'disabled');
      }
    })
    .done((data) => {
      console.log(data);
      selectLinkItem($('.paginator-item.active'));
      paginatePageInto($('.paginator-item.active'));
      swal({
        icon: 'success',
        text: 'Item deleted successfully.'
      })
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
    .always(() => {
      batchDeleteButton.removeAttr("disabled");         
    });
  });
}