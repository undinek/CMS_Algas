<?php
include_once("./templates/header.php");
include_once("./includes/Role.php");
include_once("./includes/Salary.php");
include_once("./includes/Organization.php");
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

<?php
    $role = new Role;
    $obj = new Organization; ?>

  <h3> <?php echo "Hei, ". $_SESSION["username"] ?> </h3>


	<?php if ($role->user()): ?>

    <h3 style="margin-top:0!important">Jūsu alga uzņēmumā "<?php echo $obj->getCurrentUserOrganization() ?>" </h3>
    <table class="mainTable">
        <thead>
          <tr>
            <th>Bruto</th>
            <th>IIN</th>
            <th>Sociālais nodoklis</th>
            <th>Neto</th>
            <th>Darba devējs izmaksā</th>
            <th>Spēkā</th>
          </tr>
        <thead>

        <tbody>
          <?php
            $salary = new Salary;
            echo $salary->loadCurrentUserSalary();
          ?>
        <tbody>
    </table>

	<?php
    elseif ($role->admin()): ?>

        <div class="container">
          <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Lietotāji</h5>
                      <p class="card-text">Pievieno savai organizācija lietotājus!</p>
                      <a href="http://127.0.0.1/CMS_Algas/Faili/user-view.php" class="btn btn-primary">GO</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Algas</h5>
                      <p class="card-text">Pievieno lietotāju algas!</p>
                      <a href="http://127.0.0.1/CMS_Algas/Faili/add-salary-view.php" class="btn btn-primary">GO</a>
                    </div>
                  </div>
                </div>
          </div>
        </div>


	<?php
    elseif ($role->superAdmin()): ?>

      <div class="container">
        <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Organizācijas</h5>
                    <p class="card-text">Sāc pievienot jaunas organizācijas!</p>
                    <a href="http://127.0.0.1/CMS_Algas/Faili/organization-view.php" class="btn btn-primary">GO</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Lietotāji</h5>
                    <p class="card-text">Sāc pievienot organizācijām lietotājus!</p>
                    <a href="http://127.0.0.1/CMS_Algas/Faili/user-view.php" class="btn btn-primary">GO</a>
                  </div>
                </div>
              </div>
        </div>
      </div>


	<?php
    else: ?>
      <?php header("Location:  http://127.0.0.1/CMS_Algas/Faili/"); ?>
	<?php
    endif; ?>

	<?php
endif; ?>
