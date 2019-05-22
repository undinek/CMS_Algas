<?php
if(!isset($_SESSION)){
    session_start();
}
/**
 * User Class for account creation and login purpose
 */
class User
{

  private $con;

  function __construct()
  {
  }

  //User is already registered or not
  private function emailExists($email){

    include_once("../database/db.php");
    $db = new Database();
    $this ->con = $db ->connect();

    $pre_stmt = $this->con->prepare("SELECT id FROM users WHERE email = ? ");
    $pre_stmt->bind_param("s", $email);
    $pre_stmt->execute() or die($this->con->error);
    $result = $pre_stmt->get_result();
    if ($result->num_rows > 0) {
      return 1;
    }else{
      return 0;
    }
  }

  public function createUserAccount($username,$email,$password,$organization,$role){

    include_once("../database/db.php");
    $db = new Database();
    $this ->con = $db ->connect();

    //To protect your app from SQL attack you can use prepare Statement
    if ($this->emailExists($email)) {
      return "EMAIL_ALREADY_EXISTS";
    }else{
      $pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
      $date = date("Y-m-d");
      $notes = "";
      $pre_stmt = $this->con->prepare("INSERT INTO `users`(`username`, `email`, `password`, `register_date`, `last_login`, `notes`, `role`, `org_key`)
      VALUES (?,?,?,?,?,?,?,?)");

      if($pre_stmt !== FALSE) {
          $pre_stmt->bind_param("ssssssss", $username,$email,$pass_hash,$date,$date,$notes,$role,$organization);
          $result = $pre_stmt->execute() or die($this->con->error);

          if ($result) {
              return $this->con->insert_id;
          }else {
              return "SOME_ERROR";
          }

      } else {
          die('prepare() failed: ' . htmlspecialchars($this->con->error));
      }

    }
  }
  public function userLogin($email,$password){

    include_once("../database/db.php");
    $db = new Database();
    $this ->con = $db ->connect();

    $pre_stmt = $this->con->prepare("SELECT id,username,password,last_login,org_key FROM users WHERE email = ? ");
    $pre_stmt->bind_param("s",$email);
    $pre_stmt->execute() or die($this->con->error);
    $result = $pre_stmt->get_result();

    if ($result->num_rows < 1) {
      return "NOT_REGISTERED";
    }else {
      $row = $result->fetch_assoc();
      if (password_verify($password,$row["password"])) {

        $_SESSION["isLoggedIn"] = true;
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["last_login"] = $row["last_login"];
        $_SESSION["org"] = $row["org_key"];

        //Here we are updating user last login time when he is performing login
        $last_login = date("Y-m-d h:m:s");
        $pre_stmt = $this->con->prepare("UPDATE users SET last_login = ? WHERE email = ? ");
        $pre_stmt->bind_param("ss",$last_login,$email);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
          return 1;
        }else {
          return 0;
        }
      }else {
        return "PASSWORD_NOT_MATCHED";
      }
    }
  }


  public function loadUsersInTable(){

      include_once("database/db.php");
      include_once("includes/Role.php");

      $db = new Database;
      $role = new Role;
      $this ->con = $db->connect();
      $userOrg = $_SESSION["org"];


      if($role->superAdmin()){
          // $res = $this->con->query("SELECT * FROM `users` ORDER BY `id` ASC");
          $userId = $_SESSION["userid"];
          $res = $this->con->query("
                  SELECT u.username, u.email, o.org_name
                  FROM users u, organizations o
                  WHERE u.org_key = o.id
          ");




          if($res !== FALSE) {

              foreach($res as $row){
                  $username = $row["username"];
                  $email = $row["email"];
                  $org = $row["org_name"];
                  echo '<tr>
                        <td>'.$username.'</td>
                        <td>'.$email.'</td>
                        <td>'.$org.'</td>
                        </tr>';
              }

          } else {
              die('prepare() failed: ' . htmlspecialchars($this->con->error));
          }

      }

      if($role->admin()){
          $res = $this->con->prepare("SELECT * FROM users WHERE org_key = ?");
          $res->bind_param("s",$userOrg);
          $res->execute() or die($this->con->error);
          $result = $res->get_result();

          foreach($result as $row){
              $username = $row["username"];
              $email = $row["email"];
              echo '<tr>
                    <td>'.$username.'</td>
                    <td>'.$email.'</td>
                    </tr>';
          }

		 if($role->user()){
          $res = $this->con->prepare("SELECT * FROM users WHERE org_key = ?");
          $res->bind_param("s",$userOrg);
          $res->execute() or die($this->con->error);
          $result = $res->get_result();

          foreach($result as $row){
              $username = $row["username"];
              $email = $row["email"];
              echo '<tr>
                    <td>'.$username.'</td>
                    <td>'.$email.'</td>
                    </tr>';
          }
      }


  }
}

public function loadUserInDropdown(){
  include_once("database/db.php");
  $db = new Database();
  $this->con = $db->connect();

  $res = $this->con->query("SELECT * FROM `users` ORDER BY `id` ASC");
  foreach($res as $row){
      $id = $row["id"];
      $name = $row["email"];
      echo "<option value='$id'>$name</option>";
  }
}

public function LoadOrganizationUsersDropdown(){
  include_once("database/db.php");
  include_once("Organization.php");
  $db = new Database();
  $this->con = $db->connect();
  $user= new Organization();
  $currentUserOrganization = $user->getCurrentUserOrganization();


  $res = $this->con->query("SELECT users.username, users.id FROM users LEFT JOIN organizations ON users.org_key = organizations.id WHERE organizations.org_name = '$currentUserOrganization' ");
  foreach($res as $row){
      $id = $row["id"];
      $name = $row["username"];
      echo "<option value='$id'>$name</option>";
  }
}
}
