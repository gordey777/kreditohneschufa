jQuery(document).ready(function($) {
  var menuH = ($('#header').outerHeight()) + 2,
    homeSlideH = ($('.home #content #slider').outerHeight());
  $("#content").css('margin-top', menuH + "px");

  if ($(window).width() > 1160) {
    $("#header").css('margin-top', ('-' + menuH + "px"));
  }

  $(document).on("scroll", function() {
    if ($(window).width() > 530) {

      if ($(document).scrollTop() > menuH) {
        $("#header").css("height", (menuH * .7) + "px");
        $(".logo").addClass("logo_scroll");
        $("#header .menu ul").css("margin", "-15px 0 0 0");
        $("#header .menu a").css("font-size", "19px");

      } else {
        $("#header").css("height", menuH + "px");
        $(".logo").removeClass("logo_scroll");
        $("#header .menu ul").css("margin", "0px 0 0 0");
        $("#header .menu a").css("font-size", "21px");

      }

      if ($('body').hasClass('home')) {
        if ($(document).scrollTop() > (homeSlideH )) {
          $("#header").css("height", (menuH * .7) + 50 + "px");
          $(".home #header_button_block").addClass('opened');
          $(".home #header_button_block").removeClass('hidden');

        } else if ($(document).scrollTop() < (homeSlideH - 100)) {

          $(".home #header_button_block").removeClass('opened');
          $(".home #header_button_block").addClass('hidden');
        }

      }

    }
    if ($('body').hasClass('home')) {

    } else {

      if (($(document).scrollTop() > menuH) && ($(window).width() > 775)) {
        $("#header_button_block").css("height", "50px");
      } else if ($(window).width() > 775) {
        $("#header_button_block").css("height", "90px");
      }
    }
    if (($(document).scrollTop() > menuH) && ($(window).width() < 775)) {
      $("#header_button_block").addClass('small_mob');
    } else if ($(window).width() < 775) {
      $("#header_button_block").removeClass('small_mob');
    }

  });

});
