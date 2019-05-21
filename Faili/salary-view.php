<?php
include_once("./templates/header.php");
include_once("./includes/Role.php");
include_once("./includes/Salary.php");
?>

<?php
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->user()):
?>

<div>
    <?php 
    $salary = new Salary;
    echo $salary->loadCurrentUserSalary();?>
</div>

<?php else : ?>
      <?php header("Location: http://127.0.0.1/CMS_Algas/Faili/dashboard-view.php"); ?>
<?php endif; ?>
