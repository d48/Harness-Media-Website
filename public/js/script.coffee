$ = jQuery
console = window.console

# Creates homepage slideshow

# Start lifecycle of widget 
# --------------------------------------------------------------------------
init = (@config) -> 
  slideShow(@config)

  # click handlers
  $('.work').on 'click', '.thumbs li', workExpand
  $('.work').on 'click', '#close', workClose
  $('.work').on 'click', '#prev', workMenuClick
  $('.work').on 'click', '#next', workMenuClick


# opens info for the work item
workMenuClick = (e) ->
  e.preventDefault()
  len = HMG.data.length
  workKey = $(this).data('workkey')
  
  # check if key is within bounds
  if len > workKey >= 0 
    workExpand e, workKey



# Work page thumbnails to display info
# @todo move work fn into a seperate file
workExpand = (e, showKey) ->
  e.preventDefault()
  console.log 'showKey', showKey

  # get template
  overlay = $('#template-work-overlay').html()
  tempFn = doT.template(overlay)
  key = if showKey then showKey else $(this).find('a').data('key')
  data = HMG.data
  data[key].newKey = key
  html = tempFn(data[key])


  # open overlay
  d = document.body
  h = $(d).innerHeight()
  popup = $('#work-overlay')
  isOpen = popup.is(':visible')
  if isOpen 
      popup.replaceWith(html) 
  else 
     $(d).append(html)
    
  # set height form viewport
  $('#work-overlay').css('height', h)

  # move to top
  $("html, body").animate({ scrollTop: $('#work-content').offset().top }, "fast");

 
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
