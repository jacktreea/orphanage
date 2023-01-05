  $('.modal_button').click(function(){
    //console.log($(this).attr('id'))
    
    var buttonId = $(this).attr('id');
    $('#modal-container').removeAttr('class').addClass(buttonId);
    $('body').addClass('modal-active');
  })

  $('#_modal-container').click(function(){
    $('#modal-container').addClass('out');
    $('body').removeClass('modal-active');
  });