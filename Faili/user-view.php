<?php include_once("templates/header.php");
    include_once("includes/Role.php");
    include_once("includes/user.php");?>


<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) :?>

    <div class="container-fluid">
      <h3>Sistēmā pievienotie lietotāji</h3>

      <table class="mainTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <?php $obj = new Role;
            if( $obj->superAdmin()): ?>
            <th>Organization</th>
            <?php endif; ?>
            <th>User role</th>
          </tr>
        <thead>
        <tbody>
          <?php
              $obj = new User;
              echo $obj->loadUsersInTable();
          ?>
        <tbody>
      </table>

    <button class="btn btn-default addUser">Pievienot jaunu</button>
  </div>
<?php else : ?>
    <?php header("Location: http://127.0.0.1/CMS_Algas/Faili/dashboard-view.php"); ?>
<?php endif; ?>
