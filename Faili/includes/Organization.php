<?php

class Organization{

    private $con;

    function __construct(){
    }

    public function saveOrganization($name){

        include_once("../database/db.php");
        $db = new Database();
        $this ->con = $db ->connect();

        $pre_stmt = $this->con->prepare("INSERT INTO `organizations`( `org_name`) VALUES (?)");
        $pre_stmt->bind_param("s", $name);
        $result = $pre_stmt->execute() or die($this->con->error);

        if($result){
            $response = "data saved";
        } else {
            $response = 'smth went wrong';
        }

        return $response;
    }


    // Reģistrācijas lapā ielādē iekš dropdown organizācijas
    public function loadOrganizationInDropdown(){
        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT * FROM `organizations` ORDER BY `id` ASC");
        foreach($res as $row){
            $id = $row["id"];
            $name = $row["org_name"];
            echo "<option value='$id'>$name</option>";
        }
    }

    // Parādīs pievienotās organizācijas
    public function loadOrganizationInTable(){
        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT * FROM `organizations` ORDER BY `id` ASC");
        foreach($res as $row){
            $id = $row["id"];
            $name = $row["org_name"];
            echo '<tr>
                  <td>'.$id.'</td>
                  <td>'.$name.'</td>
                  </tr>';
        }
    }

    public function loadCurrentUserOrganization(){
        $userId = $_SESSION["userid"];

        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT organizations.org_name, organizations.id FROM organizations LEFT JOIN users ON organizations.id = users.org_key WHERE users.id = $userId");
        foreach($res as $row){
            $id = $row["id"];
            $name = $row["org_name"];
            echo "<option value='$id'>$name</option>";
        }
    }


    public function getCurrentUserOrganization(){
        $userId = $_SESSION["userid"];

        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT organizations.org_name FROM organizations LEFT JOIN users ON organizations.id = users.org_key WHERE users.id = $userId");
        
        foreach($res as $row){
            $name = $row["org_name"];
        }
        return $name;
    }
}
