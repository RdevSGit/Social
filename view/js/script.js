"use strict";

function openNav() {
  $("nav").slideToggle("");
}
function openConnexion() {
  $(".connexion_form").toggleClass("display");
}

function destroySession() {
  
  $.ajax({
    type: "GET",
    url: "view/php/ajax/destroy_session.php",
    success: function () {
      document.location.href = "index.php";
    },
  });
}

$(function () {
  $(window).resize(function () {
    if ($(window).width() > 1024) {
      $("nav").css("display", "block");
    } else {
      $("nav").css("display", "none");
    }
  });
  $(".open_nav_button").on("click", openNav);
  $(".connexion_button").on("click", openConnexion);
  $(".destroy_session").on("click", destroySession);
});