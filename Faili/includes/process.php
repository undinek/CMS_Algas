<?php
session_start();
include_once("../database/constants.php");
include_once("user.php");
include_once("Organization.php");
// Nevarēja ielogoties bez šī
header('Access-Control-Allow-Origin: *');

//For registration procesing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
  $user = new User();
  $result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["orgDropdown"]);
  echo $result;
  exit();
}

// For login procesing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
  $user = new User();
  $result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
  echo $result;
  exit();
}

// For adding organization
if (isset($_POST["orgName"])) {
  $org = new Organization();
  $result = $org->saveOrganization($_POST["orgName"]);
  echo $result;
  exit();
}

//For adding salary

if (isset($_POST["salary"])) {
  $org = new Organization();
  $result = $org->saveOrganization($_POST["user", "salary"]);
  echo $result;
  exit();
}

