$('input').focus(function() {
    $(this).parent().find('label').animate({
    top: '-50%',
    fontSize: '12px'
  }, 300);
  $(this).parent().find('.border-bottom').animate({
    width: '100%',
  }, 600)
})

$('input').blur(function() {
  if ( !this.value ) {
    $(this).parent().find('label').animate({
      top: '20%',
      fontSize: '20px'
    }, 300);
  }
  $(this).parent().find('.border-bottom').animate({
    width: '0%',
  }, 600)
})