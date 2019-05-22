$(document).ready(function() {
  var DOMAIN = "http://127.0.0.1/CMS_Algas/Faili";
  $('.alert-success').hide();
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
    var orgName = $("input[name=orgDropdown]");
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

            $('.alert-success').append("Lietotājs pievienots!").show();

            setTimeout(function () {
                 window.location.href = encodeURI(
                   DOMAIN +
                     "/user-view.php"
                 );
             }, 2000);

            // console.log(data);
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
            // console.log(data);
            window.location.href = encodeURI( DOMAIN + "/dashboard-view.php");
          }
        }
      });
    }
  });

  /*Add org page
  =========================*/

  $(".addOrg").click(function(){
      window.location.href = encodeURI( DOMAIN + "/add-organization-view.php" );
  });

  $("#addOrganizationForm").on("submit", function() {
    var orgName = $("input[name=orgName]");
    var orgStatus = false;

    if(orgName.val() == null || orgName.val() == "" ){
      orgName.addClass("border-danger");
      $("#org_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet organizācijas nosaukumu</span>"
      );
      orgStatus = false;
    }else{
      orgName.removeClass("border-danger");
      $("#org_error").html("");
      orgStatus = true;
    }

      if(orgStatus){
          $.ajax({
              url: DOMAIN + "/includes/process.php",
              method: "POST",
              data: $("#addOrganizationForm").serialize(),
              success: function(data) {
                  if(data == "smth went wrong"){
                    setTimeout(function () {
                      $('.alert-danger').append("Kaut kas nav kartiba!").show();
                    }, 1000);
                  }else{
                    $('.alert-success').append("Organizācija pievienota!").show();
                    setTimeout(function () {
                        window.location.href = encodeURI( DOMAIN + "/organization-view.php" );
                    }, 2000);
                  }
                }
          });
      }
  });

  $(".addUser").click(function(){
       window.location.href = encodeURI( DOMAIN + "/register.php" );
   });


   /*Add salary page
   =========================*/

   $("#addSalaryForm").on("submit", function() {
    var salaryValue = $("input[name=salaryValue]");
    var user = $("select[name=userDropdown]");
    var apgadajamie = $("input[name=apgadajamieValue]");
    var salaryStatus, userStatus, apgadajamieStatus  = false;

    if(salaryValue.val() == null || salaryValue.val() == "" ){
      salaryValue.addClass("border-danger");
      $("#salary_error").html(
        "<span class = 'text-danger'>Lūdzu ievadiet algu</span>"
      );
      salaryStatus = false;
    }else{
      salaryValue.removeClass("border-danger");
      $("#salary_error").html("");
      salaryStatus = true;
    }

    if(user.val() == null || user.val() == "" ){
      user.addClass("border-danger");
      $("#u_error").html(
        "<span class = 'text-danger'>Lūdzu izvēlaties lietotāju</span>"
      );
      userStatus = false;
    }else{
      user.removeClass("border-danger");
      $("#u_error").html("");
      userStatus = true;
    }

    if(apgadajamie.val() == null || apgadajamie.val() == "" ){
      apgadajamie.addClass("border-danger");
      $("#apgadajamie_error").html(
        "<span class = 'text-danger'>Lūdzu izvēlaties apgadajamo skaitu</span>"
      );
      apgadajamieStatus = false;
    }else{
      apgadajamie.removeClass("border-danger");
      $("#apgadajamie_error").html("");
      apgadajamieStatus = true;
    }
    
       if(salaryStatus && userStatus && apgadajamieStatus){
           $.ajax({
               url: DOMAIN + "/includes/process.php",
               method: "POST",
               data: $("#addSalaryForm").serialize(),
               success: function(data) {
                 if(data == "smth went wrong"){
                  setTimeout(function () {
                    $('.alert-danger').append("Kaut kas nav kartiba!").show();
                  }, 1000);
                 }else{
                  setTimeout(function () {
                    $('.alert-success').append("Alga Pievienota!").show();
                  }, 1000);
                 }
                }
           });
       }
   });

    $('#range').on("input", function() {
        $('.output').val(this.value +" EUR" );
    }).trigger("change");


});
