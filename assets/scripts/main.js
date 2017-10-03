/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        console.log("Common Init Hello!");
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

       /****************************************************************************** */
        $(window).resize(function(){
          var $c = $('.container'),
              $w = $('.page-header'),
              totalWidth = $('.navbar').outerWidth(),
              wellWidth = $c.outerWidth(),
              diff = totalWidth - wellWidth,
              marg = -Math.floor((diff/2) + 15) + 'px';

          $w.each(function(){
              $(this).css({
                  'margin-left': marg,
                  'margin-right': marg
              });
          }); 

        });     
        $(window).resize();

        /***************************************************************************** */

      }
    },

    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
          
        /**************** Function to animate slider captions ************************** */
          function doAnimations( elems ) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            
            elems.each(function () {
              var $this = $(this),
                $animationType = $this.data('animation');
              $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
              });
            });
          }
          
          //Variables on page load 
          var $myCarousel = $('#carouselLwc'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
            
          //Initialize carousel 
          $myCarousel.carousel();
          
          //Animate captions in first slide on page load 
          doAnimations($firstAnimatingElems);
          
          //Pause carousel  
          $myCarousel.carousel('pause');
        
          //Other slides to be animated on carousel slide event 
          $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
          }); 	
          // End of slider things
      }
    },

    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },

    // JavaScript to be fired on the Single Event page
    'single_event': {
      init: function() {

        console.log(lwc.Event_date);

        /**************JQuery CountDown Here ****************************************** */
        $("#count-down")
        .countdown( lwc.Event_date, function(event) {
          $(this).html(event.strftime(
            '<span class="countdown-row countdown-show4">' +
              '<span class="countdown-section">' +
                  '<span class="countdown-amount">%D</span>' +
                  '<span class="countdown-period">Days</span>' +
              '</span>' +
              '<span class="countdown-section">' +
                  '<span class="countdown-amount">%H</span>' +
                  '<span class="countdown-period">Hours</span>' +
              '</span>' +
              '<span class="countdown-section">' +
                  '<span class="countdown-amount">%M</span>' +
                  '<span class="countdown-period">Minutes</span>' +
              '</span>'+
              '<span class="countdown-section">' +
                '<span class="countdown-amount">%S</span>' +
                '<span class="countdown-period">Seconds</span>' +
              '</span>'+
            '</span>'
          ));
        }); // End of JQuery Count Down

      }
    },
    
    // Contact us page
    'contact': {
      init: function() {
        console.log("Contact Init Hello!");

        /*
        *  add_marker
        *
        *  This function will add a marker to the selected Google Map
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	$marker (jQuery element)
        *  @param	map (Google Map object)
        *  @return	n/a
        */

        function add_marker( $marker, map ) {
          // var
          var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

          // create marker
          var marker = new google.maps.Marker({
              position	: latlng,
              map			: map
          });

          // add to array
          map.markers.push( marker );

          // if marker contains HTML, add it to an infoWindow
          if( $marker.html() )
          {
              // create info window
              var infowindow = new google.maps.InfoWindow({
                  content		: $marker.html()
              });

              // show info window when marker is clicked
              google.maps.event.addListener(marker, 'click', function() {
                  infowindow.open( map, marker );
              });
          }
        }

        /*
        *  center_map
        *
        *  This function will center the map, showing all markers attached to this map
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	map (Google Map object)
        *  @return	n/a
        */

        function center_map( map ) {
            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ) {
                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
                bounds.extend( latlng );
            });

            // only 1 marker?
            if( map.markers.length === 1 ) {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 16 );
            } else {
                // fit to bounds
                map.fitBounds( bounds );
            }
        }

        /*
        *  new_map
        *
        *  This function will render a Google Map onto the selected jQuery element
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	$el (jQuery element)
        *  @return	n/a
        */

        function new_map( $el ) {
          // var
          var $markers = $el.find('.marker');
          
          // vars
          var args = {
              zoom		: 16,
              center		: new google.maps.LatLng(0, 0),
              mapTypeId	: google.maps.MapTypeId.ROADMAP
          };
          
          // create map	        	
          var map = new google.maps.Map( $el[0], args);
          // console.log($el[0]);
          // console.log(args);
          
          // add a markers reference
          map.markers = [];
          
          
          // add markers
          $markers.each(function(){
              add_marker( $(this), map );
          });
          
          
          // center map
          center_map( map );
          // return
          return map;
        }

        /*
        *  document ready
        *
        *  This function will render each map when the document is ready (page has loaded)
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	5.0.0
        *
        *  @param	n/a
        *  @return	n/a
        */
        // global var
        var map = null;
        
        $(document).ready(function(){
          $('#lwc-map').each(function(){
              // create map
              map = new_map( $(this) );
          });
        });
      }

    } // End of  Contact Page
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
