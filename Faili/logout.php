<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
header("Location: http://127.0.0.1/CMS_Algas/Faili");
