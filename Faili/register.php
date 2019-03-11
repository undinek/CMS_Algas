<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Algu aprēķina sistēma</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>

    <?php
      // Navbar
      include_once("./templates/header.php");
      ?>
    <br><br>
    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Reģistrēties</div>
            <div class="card-body">
                <form id="register_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Lietotājvārds</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Ievadiet lietotājvārdu">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-pasta adrese</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Ievadiet E-pasta adresi">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Parole</label>
                        <input type="password" name="password1" class="form-control" id="password1"
                            placeholder="Parole">
                        <small id="p1_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Parole atkārtoti</label>
                        <input type="password" name="password2" class="form-control" id="password2"
                            placeholder="Parole">
                        <small id="p2_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" name="user_register" class="btn btn-primary">
                        <span class="fa fa-user"></span>&nbsp;Reģistrēties</button>
                    <span><a href="index.php">Pieslēgties</a></span>
                </form>
            </div>
            <div class="card-footer text-muted">
                <a href="#">Aizmirsi paroli?</a>
            </div>
        </div>
    </div>

</body>

</html>