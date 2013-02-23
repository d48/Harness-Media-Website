# Creates homepage slideshow
#
# Start lifecycle of widget 
# --------------------------------------------------------------------------
init = (@config) -> 
  slideShow(@config)

  # click handlers
  $('.work').on 'click', '.thumbs li', workExpand
  $('.work').on 'click', '#close', workClose


# Work page thumbnails to display info
workExpand = (e) ->
  e.preventDefault()

  # get template
  overlay = $('#template-work-overlay').html()
  tempFn = doT.template(overlay)
  key = $(this).find('a').data('key')
  data = HMG.data
  html = tempFn(data[key])


  # open overlay
  # @todo make into handlebar or doT.js pre-compiled template so can pass data to
  d = document.body
  h = $(d).innerHeight()
  $(d).append(html)

  # set height form viewport
  $('#work-overlay').css('height', h)


# close portfolio work detail
workClose = (e) ->
  e.preventDefault()

  $('#work-overlay').remove()


# slide click handler
# --------------------------------------------------------------------------
clickSlide = (e) -> 
  e.preventDefault()


# Handler to slide the next image in the slideshow
# --------------------------------------------------------------------------
nextSlide = (e) -> 
  # reference to object
  self = @ 

  # copy first slide to last post
  $(self.config.slides)
    .first().clone(true)
    .appendTo $(self.config.slides).parent()

  # animating the slide
  $(self.config.slidesContainer).animate(
    left: '-=' + $(self.config.slides).width()
    800
    'swing'
    -> 
      # remove first slide
      $(self.config.slides).first().remove()
      
      # reset left attribute for next slide
      $(self.config.slidesContainer).css 'left', 0
        
      # activateNumber
      currentSlide = $(self.config.slides).first()
      showSelected $(currentSlide).data 'id'
  )

# highlight current slide number
showSelected = (currentSlide) ->
  $(@config.numbersContainer).find("li[class='selected']").removeClass 'selected'
  slideToSelect = $(@config.numbersContainer).find "li[data-id='#{currentSlide}']"
  slideToSelect.addClass 'selected'


# start the slideshow for featured projects
# @todo break out slideshow in it's own plugin file
slideShow = (config) ->
  # set outer container
  $(config.slides).parent().css('width', @config.slideWidth * $(@config.slides).length )

  # begin auto-rotate
  if $(config.slides).length > 0
    window.setInterval nextSlide, 4000

  # Event handlers
  $(config.slides).on 'click', clickSlide


#
# Main: setup dom elements  
# --------------------------------------------------------------------------
init
  slides: '.slides li'
  slidesContainer: '.slides'
  slideWidth: 1024
  numbers: '.numbers li'
  numbersContainer: '.numbers'
