<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
header("Location: http://localhost/CMS_Algas/Faili");
