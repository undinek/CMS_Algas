
<?php

include_once("./templates/header.php");
include_once("./includes/Role.php");
?>

<?php
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->user()):
?>

<div>
	<p>Salary for previous year</p>
	
</div>

<?php else : ?>
      <?php header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php"); ?>
<?php endif; ?>
