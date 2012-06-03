/*
 * Facebox (for jQuery)
 * version: 1.2 (05/05/2008)
 * @requires jQuery v1.2 or later
 *
 * Examples at http://famspam.com/facebox/
 *
 * Licensed under the MIT:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2007, 2008 Chris Wanstrath [ chris@ozmm.org ]
 *
 *
 */
 

 
(function($) {
  $.Jfancy = function(data, klass) {
    $.Jfancy.loading()

    if (data.ajax) fillFaceboxFromAjax(data.ajax, klass)
    else if (data.image) fillFaceboxFromImage(data.image, klass)
    else if (data.div) fillFaceboxFromHref(data.div, klass)
    else if ($.isFunction(data)) data.call($)
    else $.Jfancy.reveal(data, klass)
  }

  /*
   * Public, $.Jfancy methods
   */

  $.extend($.Jfancy, {
    settings: {
      opacity      : 0.6,
      overlay      : true,
      loadingImage : 'plugins/Jfancy/images/loading.gif',
      closeImage   : 'plugins/Jfancy/images/closelabel.png',
      imageTypes   : [ 'png', 'jpg', 'jpeg', 'gif' ],
      JfancyHtml  : '\
		<div id="Jfancy" style="display:none;"> \
		  <div class="popup"> \
			<div class="content"> \
			</div> \
			<a href="#" class="close"><img src="plugins/Jfancy/images/closelabel.png" title="Cerrar" class="close_image" /></a> \
		  </div> \
		</div>'
    },

    loading: function() {
      init()
      if ($('#Jfancy .loading').length == 1) return true
      showOverlay()

      $('#Jfancy .content').empty()
      $('#Jfancy .body').children().hide().end().
        append('<div class="loading"><img src="'+$.Jfancy.settings.loadingImage+'"/></div>')

      $('#Jfancy').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show()

      $(document).bind('keydown.Jfancy', function(e) {
        if (e.keyCode == 27) $.Jfancy.close()
        return true
      })
      $(document).trigger('loading.Jfancy')
    },

    reveal: function(data, klass) {
      $(document).trigger('beforeReveal.Jfancy')
      if (klass) $('#Jfancy .content').addClass(klass)
      $('#Jfancy .content').append(data)
      $('#Jfancy .loading').remove()
      $('#Jfancy .body').children().fadeIn('normal')
      $('#Jfancy').css('left', $(window).width() / 2 - ($('#Jfancy .popup').width() / 2))
      $(document).trigger('reveal.Jfancy').trigger('afterReveal.Jfancy')
    },

    close: function() {
      $(document).trigger('close.Jfancy')
      return false
    }
  })

  /*
   * Public, $.fn methods
   */

  $.fn.Jfancy = function(settings) {
    if ($(this).length == 0) return

    init(settings)

    function clickHandler() {
      $.Jfancy.loading(true)

      // support for rel="Jfancy.inline_popup" syntax, to add a class
      // also supports deprecated "Jfancy[.inline_popup]" syntax
      var klass = this.rel.match(/Jfancy\[?\.(\w+)\]?/)
      if (klass) klass = klass[1]

      fillFaceboxFromHref(this.href, klass)
      return false
    }

    return this.bind('click.Jfancy', clickHandler)
  }

  /*
   * Private methods
   */

  // called one time to setup Jfancy on this page
  function init(settings) {
    if ($.Jfancy.settings.inited) return true
    else $.Jfancy.settings.inited = true

    $(document).trigger('init.Jfancy')
    makeCompatible()

    var imageTypes = $.Jfancy.settings.imageTypes.join('|')
    $.Jfancy.settings.imageTypesRegexp = new RegExp('\.(' + imageTypes + ')$', 'i')

    if (settings) $.extend($.Jfancy.settings, settings)
    $('body').append($.Jfancy.settings.JfancyHtml)

    var preload = [ new Image(), new Image() ]
    preload[0].src = $.Jfancy.settings.closeImage
    preload[1].src = $.Jfancy.settings.loadingImage

    $('#Jfancy').find('.b:first, .bl').each(function() {
      preload.push(new Image())
      preload.slice(-1).src = $(this).css('background-image').replace(/url\((.+)\)/, '$1')
    })

	//CONTROLAR QUE NO SE CIERRE HASTA ACABAR PROCESO
    $('#Jfancy .close').click($.Jfancy.close)
    $('#Jfancy .close_image').attr('src', $.Jfancy.settings.closeImage)
  }

  // getPageScroll() by quirksmode.com
  function getPageScroll() {
    var xScroll, yScroll;
    if (self.pageYOffset) {
      yScroll = self.pageYOffset;
      xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
      yScroll = document.documentElement.scrollTop;
      xScroll = document.documentElement.scrollLeft;
    } else if (document.body) {// all other Explorers
      yScroll = document.body.scrollTop;
      xScroll = document.body.scrollLeft;
    }
    return new Array(xScroll,yScroll)
  }

  // Adapted from getPageSize() by quirksmode.com
  function getPageHeight() {
    var windowHeight
    if (self.innerHeight) {	// all except Explorer
      windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
      windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
      windowHeight = document.body.clientHeight;
    }
    return windowHeight
  }

  // Backwards compatibility
  function makeCompatible() {
    var $s = $.Jfancy.settings

    $s.loadingImage = $s.loading_image || $s.loadingImage
    $s.closeImage = $s.close_image || $s.closeImage
    $s.imageTypes = $s.image_types || $s.imageTypes
    $s.JfancyHtml = $s.Jfancy_html || $s.JfancyHtml
  }

  // Figures out what you want to display and displays it
  // formats are:
  //     div: #id
  //   image: blah.extension
  //    ajax: anything else
  function fillFaceboxFromHref(href, klass) {
    // div
    if (href.match(/#/)) {
      var url    = window.location.href.split('#')[0]
      var target = href.replace(url,'')
      if (target == '#') return
      $.Jfancy.reveal($(target).html(), klass)

    // image
    } else if (href.match($.Jfancy.settings.imageTypesRegexp)) {
      fillFaceboxFromImage(href, klass)
    // ajax
    } else {
      fillFaceboxFromAjax(href, klass)
    }
  }

  function fillFaceboxFromImage(href, klass) {
    var image = new Image()
    image.onload = function() {
      $.Jfancy.reveal('<div class="image"><img src="' + image.src + '" /></div>', klass)
    }
    image.src = href
  }

  function fillFaceboxFromAjax(href, klass) {
    $.get(href, function(data) { $.Jfancy.reveal(data, klass) })
  }

  function skipOverlay() {
    return $.Jfancy.settings.overlay == false || $.Jfancy.settings.opacity === null
  }

  function showOverlay() {
    if (skipOverlay()) return

    if ($('#Jfancy_overlay').length == 0)
      $("body").append('<div id="Jfancy_overlay" class="Jfancy_hide"></div>')

    $('#Jfancy_overlay').hide().addClass("Jfancy_overlayBG")
      .css('opacity', $.Jfancy.settings.opacity)
	  //ACTIVA SALIDA CON OVERLAY
	  //Cuando den clic fuera blink a img close
      //.click(function() { $(document).trigger('close.Jfancy') })
      .fadeIn(600)	//Velosidad en que se muestra el Overlay
    return false
  }

  function hideOverlay() {
    if (skipOverlay()) return
	//Velosidad con que se va el OverLay
    $('#Jfancy_overlay').fadeOut(800, function(){
      $("#Jfancy_overlay").removeClass("Jfancy_overlayBG")
      $("#Jfancy_overlay").addClass("Jfancy_hide")
      $("#Jfancy_overlay").remove()
    })

    return false
  }

  /*
   * Bindings
   */

  $(document).bind('close.Jfancy', function() {
    $(document).unbind('keydown.Jfancy')
    $('#Jfancy').fadeOut(function() {
      $('#Jfancy .content').removeClass().addClass('content')
      $('#Jfancy .loading').remove()
      $(document).trigger('afterClose.Jfancy')
    })
    hideOverlay()
  })

})(jQuery);
