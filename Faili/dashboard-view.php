<?php include_once ("./templates/header.php"); ?>
<?php include_once ("./includes/Role.php"); ?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

    <p> algas - admins: uztaisit uznemumu un vina lietotajus (1 - no uznemuma var ievadit algas, 2 - no uznemuma darbinieks, redz algu(gada perspektiva)) </p>

    <?php $role = new Role; ?>

	
	<?php if ($role->user()): ?>
        
        <p>User - can see his salary for year</p>
		

	<?php
    elseif ($role->admin()): ?>
        
        <p>Admin - can add user salary</p>
		

	<?php
    elseif ($role->superAdmin()): ?>
        
        <p>SuperAdmin - can add organizations and users</p>

	<?php
    else: ?>
      <?php header("Location:  http://localhost/CMS_Algas/Faili/"); ?>
	<?php
    endif; ?>
	<?php
endif; ?>