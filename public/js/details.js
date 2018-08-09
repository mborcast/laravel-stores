$(document).ready(function() {
  handleTabItemClick($('.tab-item:first'));
  $('.tab-item').click(function() {
    handleTabItemClick($(this));
  });
});
function handleTabItemClick(element) {
  showOutlet($(element));
  selectTabItem($(element));
}
function selectTabItem(element) {
  $('.tab-item-selected').removeClass('tab-item-selected');
  $(element).addClass('tab-item-selected');
}
function showOutlet(element) {
  $('.outlet table').hide();
  $('.' + $(element).attr('data-outlet')).show();
}