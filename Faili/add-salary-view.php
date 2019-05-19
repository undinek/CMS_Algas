<?php
include_once("./templates/header.php");
include_once("includes/Organization.php");
include_once("./includes/Role.php");
include_once("./includes/user.php");
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->admin()): ?>
<div class="container" style="padding-top:5rem;">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Pievieno algu</div>
            <div class="card-body">
                <form id="addSalaryForm" method="post" onsubmit="return false" autocomplete="off">
                <div class="form-group">
                          <select name="orgDropdown" class="select-css">
                            <?php
                            $org = new Organization;
                            echo $org->loadCurrentUserOrganization();
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                          <select name="userDropdown" class="select-css">
                            <option value="--">Organizacijas lietotajs</option>
                            <?php
                            $user = new User;
                            echo $user->LoadOrganizationUsersDropdown();
                            ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Alga</label>
                        <input type="number" name="salaryValue" class="form-control" id="salaryValue" placeholder="alga">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" name="addSalary" class="btn btn-primary btnAddSalary">
                        <span class="fa fa-plus"></span>&nbsp;Pievienot</button>
                </form>
            </div>
        </div>
    </div>
  <?php else : ?>
      <?php header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php"); ?>
  <?php endif; ?>
