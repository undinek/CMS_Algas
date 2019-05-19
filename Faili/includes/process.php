<?php
session_start();
include_once("../database/constants.php");
include_once("user.php");
include_once("Organization.php");
include_once("Salary.php");
// Nevarēja ielogoties bez šī
header('Access-Control-Allow-Origin: *');

//For registration procesing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
  $user = new User();
  $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["orgDropdown"], $_POST["roleDropdown"]);
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

// For adding salary
if (isset($_POST["salaryValue"])) {
  $sal = new Salary();
  $result = $sal->addSalary($_POST["orgDropdown"], $_POST["userDropdown"], $_POST["salaryValue"]);
  echo $result;
  exit();
}

