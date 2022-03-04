"use strict";

function createAccount() {
  let pseudo = $('.pseudo_creation').val();
  let email = $(".email_creation").val();
  let password = $(".password_creation").val();
  let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (email.match(mailformat)) {
    $.ajax({
      type: "POST",
      url: "view/php/ajax/create_account.php",
      data: {
        pseudo: pseudo,
        email: email,
        password: password,
      },
      success: function (data) {
        if (data == 1) {
          console.log("error");
        } else {
          console.log("success");
        }
      },
    });
  } else {
    console.log("adresse email non valide");
  }
}

function connexionAccount() {
  let email = $(".email_connexion").val();
  let password = $(".password_connexion").val();
  $.ajax({
    type: "POST",
    url: "view/php/ajax/connexion_account.php",
    data: {
      email: email,
      password: password,
    },
    success: function (data) {
      document.location.href = "index.php?page=home";
    },
  });
}

function searchUser() {
  let input = this.value;
  $.ajax({
    type: "GET",
    url: "view/php/ajax/search_user.php",
    data: {
      input: input,
    },
    success: function (data) {
      
      if (data) {
        $(".result_search_input ul").html(data);
      } else {
        $(".result_search_input ul").html("<li>" + "vide" + "</li>");
      }
      if (input == "") {
        $(".result_search_input ul").html("");
      }
    },
  });
}

$(function () {
  $(".button_create_account").on("click", createAccount);
  $(".button_connexion_account").on("click", connexionAccount);
  $("#search_input").on("keyup", searchUser);
});