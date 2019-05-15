<?php include_once("./templates/header.php"); ?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

    <p> algas - admins: uztaisit uznemumu un vina lietotajus (1 - no uznemuma var ievadit algas, 2 - no uznemuma darbinieks, redz algu(gada perspektiva)) </p>

<?php else : ?>
      <?php header("Location: http://localhost/CMS_Algas/Faili"); ?>
<?php endif; ?>
