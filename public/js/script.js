(function() {
  var clickSlide, init, nextSlide, showSelected, slideShow, workClose, workExpand;

  init = function(config) {
    this.config = config;
    slideShow(this.config);
    $('.work').on('click', '.thumbs li', workExpand);
    return $('.work').on('click', '#close', workClose);
  };

  workExpand = function(e) {
    var d, data, h, html, overlay, tempFn;
    e.preventDefault();
    data = {
      description: 'My short description goes here and should be very descriptive of the overall project. Two to 3 sentences max.',
      pictures: ['img/work-fpo-pictures.png', 'img/work-fpo-pictures.png', 'img/work-fpo-pictures.png', 'img/work-fpo-pictures.png', 'img/work-fpo-pictures.png', 'img/work-fpo-pictures.png'],
      services: ['FRY', 'ECommerce', 'Endecea', 'Scene7', 'Gomez', 'WordPress', 'Omniture/SiteCatalyst', 'Google Analytics'],
      title: 'The Project Title'
    };
    overlay = $('#template-work-overlay').html();
    tempFn = doT.template(overlay);
    html = tempFn(data);
    d = document.body;
    h = $(d).innerHeight();
    $(d).append(html);
    return $('#overlay').css('height', h);
  };

  workClose = function(e) {
    e.preventDefault();
    return $('#overlay').remove();
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

  slideShow = function(config) {
    $(config.slides).parent().css('width', this.config.slideWidth * $(this.config.slides).length);
    if ($(config.slides).length > 0) {
      window.setInterval(nextSlide, 4000);
    }
    return $(config.slides).on('click', clickSlide);
  };

  init({
    slides: '.slides li',
    slidesContainer: '.slides',
    slideWidth: 1024,
    numbers: '.numbers li',
    numbersContainer: '.numbers'
  });

}).call(this);
