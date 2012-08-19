$(function () {
  var menu = $('header'),
  pos = menu.offset();
  offsetBug = 60;

  $(window).scroll(function () {
    if ($(this).scrollTop() > (pos.top + menu.height() - offsetBug) && menu.hasClass('default')) {
      menu.fadeOut('fast', function () {
        $(this).removeClass('default').addClass('fixed').fadeIn('fast');
      });
    } else if ($(this).scrollTop() <= pos.top && menu.hasClass('fixed')) {
      menu.fadeOut('fast', function () {
        $(this).removeClass('fixed').addClass('default').fadeIn('fast');
      });
    }
  });
});
