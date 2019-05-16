<?php

class Salary{

    private $con;

    function __construct(){
    }

    public function saveOrganization($name, $salary){

        include_once("../database/db.php");
        $db = new Database();
        $this ->con = $db ->connect();

        $pre_stmt = $this->con->prepare("INSERT INTO `salary`( `user`, 'salary') VALUES (?), (?)");
        $pre_stmt->bind_param("s", $name);
		//$pre_stmt->bind_param("s", $salary);
        $result = $pre_stmt->execute() or die($this->con->error);

        if($result){
            $response = "data saved";
        } else {
            $response = 'smth went wrong';
        }

        return $response;
    }

/*
    // Reģistrācijas lapā ielādē iekš dropdown organizācijas
    public function loadUserInDropdaown($user){
        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT * FROM `salary` WHERE 'user' = (?) ORDER BY `id` ASC");
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
	*/
}
