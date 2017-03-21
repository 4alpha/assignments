// Agency Theme JavaScript

(function ($) {
  "use strict"; // Start of use strict

  // jQuery for page scrolling feature - requires jQuery Easing plugin
  $('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top - 50)
    }, 1250, 'easeInOutExpo');
    event.preventDefault();
  });

  // Highlight the top nav as scrolling occurs
  $('body').scrollspy({
    target: '.navbar-fixed-top',
    offset: 51
  });

  // Closes the Responsive Menu on Menu Item Click
  $('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
  });

  // Offset for Main Navigation
  $('#mainNav').affix({
    offset: {
      top: 100
    }
  })
  $(function () {
    var formHeight = $('#formPartContainer').height();
    var formWidth = $('#formPartContainer').width();
    var mapContainer = $('#mapContainer');
    var frameHTML = '<iframe src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.2131447483284!2d73.77694431489347!3d18.564426987383463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7266890ab24351a!2sARSTECH!5e0!3m2!1sen!2s!4v1489248848647"';
    frameHTML += ' width="' + (formWidth - 30) + '" height="' + formHeight + '"';
    frameHTML += ' frameborder="0" style="border:0" allowfullscreen></iframe>';
    //alert(frameHTML);

    mapContainer.html(frameHTML);
  });
})(jQuery); // End of use strict