function itemOpen(collapsible){
  collapsible = $(collapsible);
  if ($(collapsible).hasClass('active')) {
    var test = collapsible.find('.arrow').html('keyboard_arrow_down');
  } else {
    collapsible.find('.arrow').html('keyboard_arrow_up');
  }
}
