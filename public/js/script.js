// Generated by CoffeeScript 1.3.3
(function() {
  var clickSlide, init, nextSlide, showSelected;

  init = function(config) {
    this.config = config;
    $(this.config.slides).parent().css('width', this.config.slideWidth * $(this.config.slides).length);
    if ($(this.config.slides).length > 0) {
      window.setInterval(nextSlide, 4000);
    }
    return $(this.config.slides).on('click', this.clickSlide);
  };

  clickSlide = function(e) {
    return e.preventDefault();
  };

  nextSlide = function(e) {
    var self;
    self = this;
    $(self.config.slides).first().clone(true).appendTo($(self.config.slides).parent());
    return $(self.config.slidesContainer).animate({
      left: '-=' + $(self.config.slides).width()
    }, 800, 'swing', function() {
      var currentSlide;
      $(self.config.slides).first().remove();
      $(self.config.slidesContainer).css('left', 0);
      currentSlide = $(self.config.slides).first();
      return showSelected($(currentSlide).data('id'));
    });
  };

  showSelected = function(currentSlide) {
    var slideToSelect;
    $(this.config.numbersContainer).find("li[class='selected']").removeClass('selected');
    slideToSelect = $(this.config.numbersContainer).find("li[data-id='" + currentSlide + "']");
    return slideToSelect.addClass('selected');
  };

  init({
    slides: '.slides li',
    slidesContainer: '.slides',
    slideWidth: 1024,
    numbers: '.numbers li',
    numbersContainer: '.numbers'
  });

}).call(this);
