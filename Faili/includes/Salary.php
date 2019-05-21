<?php

class Salary{

    private $con;

    function __construct(){
    }

    public function addSalary($organization_id, $user_id, $salary){

        include_once("../database/db.php");
        $db = new Database();
        $this ->con = $db ->connect();

        $pre_stmt = $this->con->prepare("INSERT INTO `salary`(`org_id`, `user_id`, `salary`) VALUES (?,?,?);");
        $pre_stmt->bind_param("iis", $organization_id, $user_id, $salary);
        $result = $pre_stmt->execute() or die($this->con->error);

        if($result){
            $response = "data saved";
        } else {
            $response = 'smth went wrong';
        }

        return $response;
    }

    public function loadCurrentUserSalary(){
        $userId = $_SESSION["userid"];

        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT salary FROM salary WHERE user_id = $userId");
        foreach($res as $row){
            $salary = $row["salary"];
            echo '<tr>
                  <td>'.$salary.'</td>
                  </tr>';
        }
    }
}
