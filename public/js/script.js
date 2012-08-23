$(function () {

  // /**
  //  * setup variables
  //  */
  // var header            = $('header')
  //   , body              = $('body')
  //   , navButton         = $('#nav-menu-button')
  //   , navLinks          = $('#nav-primary')
  //   , mobileView        = $('html').width() <= 768
  //   , headerPosition    = header.offset()
  //   , offsetBug         = (header.height() / 2)
  //   , yCoordForFixedNav = headerPosition.top + header.height() - offsetBug
  //   ;


  // /**
  //  * Shows persistent navigation
  //  * 
  //  * @return void
  //  */
  // function showFixedNav() {
  //   body.removeClass('default').addClass('fixed');
  //   body.removeClass('open');
  //   // adjust for height resizing
  //   window.scroll(0,1);

  //   // always hide menu on mobile view
  //   if($('html').width()<=768) { 
  //     navLinks.hide(); 
  //   } else {
  //     navLinks.show();
  //   }
  // }

  // /**
  //  * Hides persistent navigation
  //  * 
  //  */
  // function hideFixedNav() {
  //   body.removeClass('fixed').addClass('default');
  //   // adjust for height resizing
  //   window.scroll(0, offsetBug-1);

  //   // nav links always show by default
  //   navLinks.show();
  // }

  // // Navigation
  // // -------------------------------------------------------------------------
  // 
  // /**
  //  * adds persistent navigation  
  //  */
  // $(window).scroll(function setFixedNavigation () {

  //   // Show fixed position menu
  //   if ($(this).scrollTop() > yCoordForFixedNav && body.hasClass('default')) {
  //     showFixedNav();
  //   } 
  //   // Show regular menu
  //   else if ($(this).scrollTop() <= headerPosition.top && body.hasClass('fixed')) {
  //     hideFixedNav();
  //   }
  // });

  // /**
  //  * for local debugging, add resize function 
  //  */
  // $(window).resize(function resizeWindow() {
  //   // hide links if showing persistent nav
  //   if($('html').width()<=768 && body.hasClass('fixed')) { 
  //     navLinks.hide(); 
  //   } else {
  //     navLinks.show();
  //   }
  //   body.removeClass('open');
  // });



  // // Events
  // // -------------------------------------------------------------------------

  // /**
  //  * menu toggle for mobile view  
  //  */
  // $('nav').on('click', navButton,

  //   function navMenuClick(e) {
  //     if(navLinks.is(':hidden')) {
  //       body.addClass('open');
  //       navLinks.show();
  //     } else {
  //       body.removeClass('open');
  //       navLinks.hide();
  //     }
  //     e.preventDefault();

  //   }
  // );

});
