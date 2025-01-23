function computer_repair_services_openNav() {
  jQuery(".sidenav").addClass('show');
}
function computer_repair_services_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function computer_repair_services_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const computer_repair_services_nav = document.querySelector( '.sidenav' );

      if ( ! computer_repair_services_nav || ! computer_repair_services_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...computer_repair_services_nav.querySelectorAll( 'input, a, button' )],
        computer_repair_services_lastEl = elements[ elements.length - 1 ],
        computer_repair_services_firstEl = elements[0],
        computer_repair_services_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && computer_repair_services_lastEl === computer_repair_services_activeEl ) {
        e.preventDefault();
        computer_repair_services_firstEl.focus();
      }

      if ( shiftKey && tabKey && computer_repair_services_firstEl === computer_repair_services_activeEl ) {
        e.preventDefault();
        computer_repair_services_lastEl.focus();
      }
    } );
  }
  computer_repair_services_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var slider_loop = jQuery('#top-slider').attr('slider-loop');
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      autoHeight: true,
      loop: slider_loop == 0 ? false : slider_loop,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.navigation_header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.navigation_header').addClass("stick_header");
    } else {
      jQuery('.navigation_header').removeClass("stick_header");
    }
  }
});
