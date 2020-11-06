;(function($){

    let container = document.querySelectorAll('.pts_container');

    container.forEach( function( index ) {

      // column 
      const dcol          = $(index).data('dcol');
      const tcol          = $(index).data('tcol');
      const mcol          = $(index).data('mcol');
      
      // column Space 
      const dcol_space    = $(index).data('dspace');
      const tcol_space    = $(index).data('tspace');
      const mcol_space    = $(index).data('mspace');
      
      // carousel settings 
      const autoplayCount = $(index).data('autoplay');
      const speed         = $(index).data('speed');
      const loop          = $(index).data('loop');
      const pause         = $(index).data('pause');

      // font family 
      const ff         = $(index).data('ff');
      
      let autoPlayMode    = ( autoplayCount == 1 ) ? true : false; 
      let loopMode        = ( loop == 1 ) ? true : false; 
      let pauseMode       = ( pause == 1 ) ? true : false; 

      // Google Fonts 
      WebFont.load({
        google: {
          families: [ff]
        }
      });

      // Carousel Main Code 
      let id = $(index).data('id');
      let ptsSelector = '.pts_swiper_'+ id;

      var mySwiper = new Swiper( ptsSelector , {
        loop: loopMode,
        autoplay: autoPlayMode,
        speed: speed,
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
          dynamicBullets: true
        },
        navigation: {
          nextEl: '.pts-next',
          prevEl: '.pts-prev',
        },

        breakpoints: {

          320: {
            slidesPerView: mcol,
            spaceBetween: mcol_space
          },

          601: {
            slidesPerView: tcol,
            spaceBetween: tcol_space
          },

          992: {
            slidesPerView: dcol,
            spaceBetween: dcol_space
          }
        }
     });
      // close carousel main code 
      
      if ( pauseMode == true ) {
        $(ptsSelector).hover(function() {

        (this).swiper.autoplay.stop();

        }, function() {

            (this).swiper.autoplay.start();

        });
      }
    });

})(jQuery)
