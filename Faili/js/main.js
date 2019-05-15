$(document).ready(function() {
  var DOMAIN = "http://localhost/CMS_Algas/Faili";
  $("#register_form").on("submit", function() {
    var status = false;
    var username = $("#username");
    var email = $("#email");
    var pass1 = $("#password1");
    var pass2 = $("#password2");
    var type = $("#usertype");
    var n_patt = new RegExp(/^[A-Za-z ]+$/);
    //alvis.skeps98@gmail.com
    var e_patt = new RegExp(
      /^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/
    );
    //Checks username
    if (username.val() == "" || username.val().length < 6) {
      username.addClass("border-danger");
      $("#u_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet lietotājvārdu, tam jāsastāv no vismaz 6 simboliem</span>"
      );
      status = false;
    } else {
      username.removeClass("border-danger");
      $("#u_error").html("");
      status = true;
    }
    //Checks E-mail
    if (!e_patt.test(email.val())) {
      email.addClass("border-danger");
      $("#e_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet derīgu E-pasta adresi</span>"
      );
      status = false;
    } else {
      email.removeClass("border-danger");
      $("#e_error").html("");
      status = true;
    }
    //Checks Password
    if (pass1.val() == "" || pass1.val().length < 9) {
      pass1.addClass("border-danger");
      $("#p1_error").html(
        "<span class = 'text-danger'>Parolei jāsastāv no vismaz 9 simboliem</span>"
      );
      status = false;
    } else {
      pass1.removeClass("border-danger");
      $("#p1_error").html("");
      status = true;
    }
    //Checks Password2
    if (pass2.val() == "" || pass2.val().length < 9) {
      pass2.addClass("border-danger");
      $("#p2_error").html(
        "<span class = 'text-danger'>Parolei jāsastāv no vismaz 9 simboliem</span>"
      );
      status = false;
    } else {
      pass2.removeClass("border-danger");
      $("#p2_error").html("");
      status = true;
    }
    //Checks if passwords are matched
    if (pass2.val() == pass1.val() && status == true) {
      $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: $("#register_form").serialize(),
        success: function(data) {
          if (data == "EMAIL_ALREADY_EXISTS") {
            alert("Šāda E-pasta adrese jau tiek izmantota");
          } else if (data == "SOME_ERROR") {
            alert("Something Wrong");
          } else {
            window.location.href = encodeURI(
              DOMAIN +
                "/index.php?msg=Esat reģistrējeis, tagad varat pieslēgties"
            );
          }
        }
      });
    } else {
      pass2.addClass("border-danger");
      $("#p2_error").html(
        "<span class = 'text-danger'>Paroles nesakrīt</span>"
      );
      status = true;
    }
  });
  //For login PART
  $("#form_login").on("submit", function() {
    var email = $("#log_email");
    var pass = $("#log_password");
    var status = false;

    if (email.val() == "") {
      email.addClass("border-danger");
      $("#e_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet E-pasta adresi</span>"
      );
      status = false;
    } else {
      email.removeClass("border-danger");
      $("#e_error").html("");
      status = true;
    }

    if (pass.val() == "") {
      pass.addClass("border-danger");
      $("#p_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet paroli</span>"
      );
      status = false;
    } else {
      pass.removeClass("border-danger");
      $("#p_error").html("");
      status = true;
    }
    if (status) {
      $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: $("#form_login").serialize(),
        success: function(data) {
          if (data == "NOT_REGISTERED") {
            email.addClass("border-danger");
            $("#e_error").html(
              "<span class = 'text-danger'>Izskatās, ka jūs neesat reģistrējies</span>"
            );
          } else if (data == "PASSWORD_NOT_MATCHED") {
            pass.addClass("border-danger");
            $("#p_error").html(
              "<span class = 'text-danger'>Lūdzu ievadiet pareizu paroli</span>"
            );
          } else {
            console.log(data);
            window.location.href = encodeURI( DOMAIN + "/dashboard-view.php");
          }
        }
      });
    }
  });
});
