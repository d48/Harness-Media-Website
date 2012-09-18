// Creates homepage slideshow
var HMG = {

  // Start lifecycle of widget 
  // --------------------------------------------------------------------------
  init: function( config ) {
    this.config = config;

    // set outer container
    $(this.config.slides).parent().css('width', this.config.slideWidth * $(this.config.slides).length );

    // begin auto-rotate
    if ( $(this.config.slides).length > 0 ) {
      // window.setInterval(this.nextSlide, 4000);
    }

    // Event handlers
    $(this.config.slides).on('click',this.clickSlide);
  },


  // Click handler
  // --------------------------------------------------------------------------
  clickSlide: function(e) {
    e.preventDefault();
  },


  // Handler to slide the next image in the slideshow
  // --------------------------------------------------------------------------
  nextSlide: function(e) {
    // reference to object
    var self = HMG;

    
    // copy first slide to last post
    $(self.config.slides)
      .first().clone(true)
      .appendTo( $(self.config.slides).parent() );


    // animating the slide
    $(self.config.slidesContainer).animate(
        { left: '-=' + $(self.config.slides).width() }
      , 800
      , 'swing'
      , function removeFirstSlide() { 


          // remove first slide
          $(self.config.slides).first().remove();
          
          // reset left attribute for next slide
          $(self.config.slidesContainer).css('left',0);
            
          // activateNumber
          var currentSlide = $(self.config.slides).first();
          console.log("this is current slide ID", $(currentSlide).data('id'));

          self.showSelected( $(currentSlide).data('id') );
        }
    );
  },

  showSelected: function( currentSlide ) {
    var self = HMG;

    $(self.config.numbersContainer).find("li[class='selected']").removeClass('selected')
    var slideToSelect = $(self.config.numbersContainer).find("li[data-id='"+ currentSlide +"']");
    slideToSelect.addClass('selected');
  }
}; // HMG

(function() {

  /**
   * setup dom elements  
   */
  HMG.init({
      slides: '.slides li'
    , slidesContainer: '.slides'
    , slideWidth: 1024
    , numbers: '.numbers li'
    , numbersContainer: '.numbers'
  });

})();
