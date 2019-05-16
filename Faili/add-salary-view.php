<?php
include_once("./templates/header.php");
include_once("includes/Salary.php");
include_once("./includes/Role.php");
?>

<?php
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->admin()):
?>

<div class="container" style="padding-top:5rem;">
        <div class="card mx-auto" style="width: 30rem;">
        <form id="addSalaryForm" method="post" onsubmit="return false" autocomplete="off">
             <div class="form-group">
                        <label for="user">User</label>
                        <input type="text" name="user" class="form-control" id="user"
                            placeholder="Ievadiet lietotāju">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" class="form-control" id="salary"
                            placeholder="Ievadiet algu">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
					<button type="submit" name="addSalary" class="btn btn-primary btnAddSalary">
                        <span class="fa fa-plus"></span>&nbsp;Pievienot</button>
        </form>
        </div>
        </div>
         <?php
else:
?>
     <?php
    header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php");
?>
 <?php
endif;
?>