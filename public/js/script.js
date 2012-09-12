$(function () {

  // Creates homepage slideshow
  var HMGslideshow = {};

  // vars 
  var slide_button = $('.slideshow li')
    , slides = $('.slideshow li')
    , slides_container= slide_button.parent()
    ;

  // init
  // set up container width
  slides_container.css('width', slides.width() * slides.length );

  // click event handler
  slides.on('click','img', event, onClickSlide);

  // methods
  function onLoadPlay() {
    setInterval(onClickSlide, 2000);
  }

  /**
   * handler to slide the next image in the slideshow
   */
  function onClickSlide() {
    console.log('clicked', this, event);

    var secondToLastIndex = slides.length - 1;

    // check for last slide
    if( $('.slideshow li:nth-child('+secondToLastIndex+') img')[0] == this) {
      // append previous slides
      console.log('last slide reached');

    }

    // animating the slide
    slides
      .animate({
        left: '-=' + $(this).width()
      },
      {
        duration: 800  
      });
  }
});
