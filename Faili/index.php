<?php
include_once("./database/constants.php");
include_once("./templates/header.php");
?>

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
    <link rel="stylesheet" href="./includes/style.css">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
    <br><br>
    <div class="container">
        <?php
            if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {
              ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
            }
         ?>
        <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form id="form_login" onsubmit="return false">
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-pasta adrese</label>
                        <input type="email" class="form-control" name="log_email" id="log_email"
                            placeholder="Ievadiet E-pasta adresi">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Parole</label>
                        <input type="password" class="form-control" name="log_password" id="log_password"
                            placeholder="Ievadiet paroli">
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Pieslēgties</button>

                </form>
            </div>
            <div class="card-footer"><a href="#">Aizmirsi paroli?</a>
			</div>
        </div>
		 
        </div>
    </div>

</body>

</html>
