jQuery(document).ready(function($) {
  var menuH = ($('#header').outerHeight()) + 2;
  $("#content").css('margin-top', menuH + "px");
  $("#header").css('margin-top', ('-' + menuH + "px"));


  $(document).on("scroll", function() {
    if ($(document).scrollTop() > menuH) {
      $(".logo").addClass("logo_scroll");
      $("#header").css("height", (menuH * .7) + "px");
      $("#header .menu ul").css("margin", "-15px 0 0 0");
      $("#header .menu a").css("font-size", "19px");
    } else {
      $(".logo").removeClass("logo_scroll");
      $("#header").css("height", menuH + "px");
      $("#header .menu ul").css("margin", "0px 0 0 0");
      $("#header .menu a").css("font-size", "21px");
    }
  });


});
