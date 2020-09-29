
     // Scrolling Effect
     $(window).on("scroll", function () {
          if ($(window).scrollTop()) {
               $('.nav-visitor').addClass('black');
          } else {
               $('.nav-visitor').removeClass('black');
          }
     });
