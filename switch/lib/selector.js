$(document).ready(function() {

  $('a[data-viewport-width]').on('click', function(e) {
    if($(this).attr('data-viewport-width') == '100%') {
      newWidth = $(window).width();
    }else{
      newWidth = $(this).attr('data-viewport-width');
    }
    if($(this).attr('data-viewport-height') == '100%') {
      newHeight = $(window).height();
    }else{
      newHeight = $(this).attr('data-viewport-height');
    }
    $('a[data-viewport-width]').removeClass('active');
    $(this).addClass('active');
    $('#resizerFrame').stop().animate({'max-width': newWidth, 'max-height': newHeight}, 200);
    e.preventDefault();
    return false;
  });


  $('a.rotate').on('click', function(e) {
    $(this).children('i[class*=icon]').toggleClass('rotate-90-ctr');
    $('a[data-rotate=true]').each(function() {
      $(this).children('i[class*=icon]').toggleClass('rotate-90-ctr');
      width = $(this).attr('data-viewport-width');
      height = $(this).attr('data-viewport-height');
      // shuffle values
      $(this).attr('data-viewport-width', height);
      $(this).attr('data-viewport-height', width);
      if($(this).hasClass('active')) {
        $(this).trigger('click');
      }
    });
  });
  
});
