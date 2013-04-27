(function() {
  var $, clickSlide, console, init, nextSlide, showSelected, slideShow, workClose, workExpand, workMenuClick;

  $ = jQuery;

  console = window.console;

  init = function(config) {
    this.config = config;
    slideShow(this.config);
    $('.work').on('click', '.thumbs li', workExpand);
    $('.work').on('click', '#close', workClose);
    $('.work').on('click', '#prev', workMenuClick);
    return $('.work').on('click', '#next', workMenuClick);
  };

  workMenuClick = function(e) {
    var len, workKey;
    e.preventDefault();
    len = HMG.data.length;
    workKey = $(this).data('workkey');
    if ((len > workKey && workKey >= 0)) {
      return workExpand(e, workKey);
    }
  };

  workExpand = function(e, showKey) {
    var d, data, h, html, isOpen, key, overlay, popup, tempFn;
    e.preventDefault();
    overlay = $('#template-work-overlay').html();
    tempFn = doT.template(overlay);
    key = showKey != null ? showKey : $(this).find('a').data('key');
    data = HMG.data;
    data[key].newKey = key;
    html = tempFn(data[key]);
    d = document.body;
    h = $(d).innerHeight();
    popup = $('#work-overlay');
    isOpen = popup.is(':visible');
    if (isOpen) {
      popup.replaceWith(html);
    } else {
      $(d).append(html);
    }
    $('#work-overlay').css('height', h);
    $("html, body").animate({
      scrollTop: $('#work-content').offset().top
    }, "fast");
    return window.Cufon.refresh();
  };

  workClose = function(e) {
    e.preventDefault();
    return $('#work-overlay').remove();
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
