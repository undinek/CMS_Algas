<?php
    // Navbar
    include_once("./templates/header.php");
    include_once("includes/Organization.php");
?>
    <br><br>
    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Reģistrēties</div>
            <div class="card-body">
                <form id="register_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Lietotājvārds</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Ievadiet lietotājvārdu">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-pasta adrese</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Ievadiet E-pasta adresi">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Parole</label>
                        <input type="password" name="password1" class="form-control" id="password1"
                            placeholder="Parole">
                        <small id="p1_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Parole atkārtoti</label>
                        <input type="password" name="password2" class="form-control" id="password2"
                            placeholder="Parole">
                        <small id="p2_error" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                          <select name="orgDropdown" class="select-css">
                            <option value="--">Lietotāja organizācija</option>
                            <?php
                            $obj = new Organization;
                            echo $obj->loadOrganizationInDropdown();
                            ?>
                          </select>
                    </div>

                    <button type="submit" name="user_register" class="btn btn-primary">
                        <span class="fa fa-user"></span>&nbsp;Reģistrēt</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
