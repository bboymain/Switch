
   $(document).ready(function() {
      $('#resizerFrame').each(function() {
        $(this).css('max-width',$(window).width());
        $(this).css('max-height',$(window).height());
      });
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
      $('#closeResizer').on('click', function(e) {
        newWidth = $(window).width();
        newHeight = $(window).height();
        $('a[data-viewport-width]').removeClass('active');
        $('#resizerFrame').stop().animate({'max-width': newWidth, 'max-height': newHeight}, 200);
        $('#resizer').fadeOut(500, function() {
          document.location = document.getElementById("resizerFrame").contentWindow.location.href;
        });
        e.preventDefault();
        return false;
      });
      if(querystring('url').length > 0) {
        $('#resizerFrame').attr('src',querystring('url'));
      }
      $('#resizerFrame').on('load', function() {
        var url = basename(this.contentWindow.location.href);
        var href = updateQueryStringParameter(document.location.href, 'url', url);
        var stateObj = { resizer: 'resizer' };
        history.pushState(stateObj, url, href);
      });
    });
    $(window).resize(function() {
      if($('#resizer li:first-child a').hasClass('active')) {
        $('#resizerFrame').css('max-width', $(window).width());
        $('#resizerFrame').css('max-height', $(window).height());
      }
    });