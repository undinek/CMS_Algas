<?php include_once("./templates/header.php"); ?>
<?php include_once("./includes/Role.php"); ?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

    <p> algas - admins: uztaisit uznemumu un vina lietotajus (1 - no uznemuma var ievadit algas, 2 - no uznemuma darbinieks, redz algu(gada perspektiva)) </p>

    <?php $role = new Role; ?>

	
	<?php if ($role->user()) :?>
        
        <p>show salary for year</p>
		

	<?php elseif ($role->admin()) :?>
        
        <p>add user salary</p>
		<form id="add_salary">
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
		</form>
		

	<?php elseif ($role->superAdmin()) :?>
        
        <p>add organizations and users</p>

	<?php else : ?>
      <?php header("Location: http://localhost/Faili"); ?>
	<?php endif; ?>
	<?php endif; ?>