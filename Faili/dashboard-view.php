<?php
include_once("./templates/header.php");
include_once("./includes/Role.php");
include_once("./includes/Salary.php");
include_once("./includes/Organization.php");
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

    <?php $role = new Role;
          $obj = new Organization; ?>


	<?php if ($role->user()): ?>

    <h3>Jūsu alga uzņēmumā "<?php echo $obj->getCurrentUserOrganization() ?>" </h3>
    <table class="mainTable">
        <thead>
          <tr>
            <th>Neto</th>
            <th>IIN</th>
            <th>Sociālais nodoklis</th>
            <th>Bruto</th>
            <th>Darba devējs izmaksā</th>
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

        <p>can add user salary</p>


	<?php
    elseif ($role->superAdmin()): ?>

        <p>can add organizations and users</p>

	<?php
    else: ?>
      <?php header("Location:  http://127.0.0.1/CMS_Algas/Faili/"); ?>
	<?php
    endif; ?>
	<?php
endif; ?>
