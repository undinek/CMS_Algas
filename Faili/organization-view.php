<?php include_once("./templates/header.php"); ?>
<?php include_once("./includes/Organization.php"); ?>
<?php include_once("./includes/Role.php"); ?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->superAdmin()): ?>
    <div class="container-fluid">

        <h3>Sistēmā pievienotās organizācijas</h3>
        <table class="mainTable">
          <thead>
          <tr>
            <th>ID</th>
            <th>Organization name</th>
          </tr>
          <thead>
            <tbody>
          <?php
              $obj = new Organization;
              echo $obj->loadOrganizationInTable();
          ?>
          <tbody>
        </table>

        <div class="wrapper">
          <button class="btn btn-default addOrg">Pievienot jaunu</button>
        </div>
        
    </div>
<?php else : ?>
    <?php header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php"); ?>
<?php endif; ?>
