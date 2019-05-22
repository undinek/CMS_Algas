<?php
  include_once("./templates/header.php");
  include_once("includes/Organization.php");
  include_once("./includes/Role.php");
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->superAdmin()): ?>
<div class="alert alert-success hide"></div>
<div class="container" style="padding-top:5rem;">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Pievieno organizāciju</div>
            <div class="card-body">
                <form id="addOrganizationForm" method="post" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label>Organizācijas nosaukums</label>
                        <input type="text" name="orgName" class="form-control" id="orgName" placeholder="name here">
                        <small id="org_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" name="addOrg" class="btn btn-primary btnAddOrg">
                        <span class="fa fa-user"></span>&nbsp;Pievienot</button>
                </form>
            </div>
        </div>
    </div>
  <?php else : ?>
      <?php header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php"); ?>
  <?php endif; ?>
