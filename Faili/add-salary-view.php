<?php
include_once("./templates/header.php");
include_once("includes/Organization.php");
include_once("./includes/Role.php");
include_once("./includes/user.php");
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $role->admin()): ?>
<div class="alert alert-success hide"></div>

<div class="container" style="padding-top:5rem;">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Pievieno algu</div>
            <div class="card-body">
                <form id="addSalaryForm" method="post" onsubmit="return false" autocomplete="off">
                <div class="form-group">
                          <select name="orgDropdown" class="select-css">
                            <?php
                            $org = new Organization;
                            echo $org->loadCurrentUserOrganization();
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                          <select name="userDropdown" class="select-css">
                            <option selected="true" disabled="disabled" value="">Izvēlies lietotāju</option>
                            <?php
                            $user = new User;
                            echo $user->LoadOrganizationUsersDropdown();
                            ?>
                          </select>
                          <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Alga</label>
                        <input type="number" min="0" name="salaryValue" class="form-control" id="salaryValue" placeholder="alga">
                        <small id="salary_error" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label>Apgādājamo skaits</label>
                        <input type="number" min="0" name="apgadajamieValue" class="form-control" id="apgadajamieValue" placeholder="Apgādājamo sk.">
                        <small id="apgadajamie_error" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <p>Ar nodokli neapliekamā summa</p>
                          <label for="range">
                          <input type="range" name="range" id="range" min="0" max="230" step="1" value="0"/>
                          </label>
                          <output for="range" class="output"></output>
                    </div>

                    <div class="form-group">
                      <p>Izvēlies mēnesi</p>
                      <label>
                      <input type="text"
                         name="datepicker"
                         id="datepicker"
                         class="datepicker-here"
                         data-language='en'
                         data-min-view="months"
                         data-view="months"
                         data-date-format="MM yyyy" />
                       </label>
                    </div>


                    <button type="submit" name="addSalary" class="btn btn-primary btnAddSalary">
                        <span class="fa fa-plus"></span>&nbsp;Pievienot</button>
                </form>
            </div>
        </div>
    </div>
  <?php else : ?>
      <?php header("Location: http://localhost/CMS_Algas/Faili/dashboard-view.php"); ?>
  <?php endif; ?>
