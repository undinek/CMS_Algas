<?php

class Salary{

    private $con;

    function __construct(){
    }

    public function addSalary($organization_id, $user_id, $salary, $apgadajamie, $neapliekamaisMin, $date){

        include_once("../database/db.php");
        $db = new Database();
        $this ->con = $db ->connect();

        $pieces = explode(" ", $date);
        $salaryMonth = $pieces[0];
        $salaryYear = (int)$pieces[1];

        $neapliekamais =0;

        if ($salary <= 1100){
          $neapliekamais = $neapliekamaisMin;
        }

        $iedzivotajuIenakumuNodoklis;

        if($salary <= 1667){
          $iedzivotajuIenakumuNodoklis = 0.20;
        } elseif ($salary > 1667 && $salary < 5233) {
          $iedzivotajuIenakumuNodoklis = 0.23;
        } else {
          $iedzivotajuIenakumuNodoklis = 0.314;
        }

        $apgadajamaSumma = $apgadajamie * 230;
        $darbiniekaVSAOI = 0.11 * $salary;
        $darbaDevejaVSAOI = 0.2409 * $salary;

        $apliekamaSumma = $salary - $apgadajamaSumma - $darbiniekaVSAOI - $neapliekamais;
        $IIN = $apliekamaSumma * 0.20;

        $riskaNodeva = 0.36;
        $darbaDevejaIzmaksas = $salary + $darbaDevejaVSAOI + $riskaNodeva;

        $pre_stmt = $this->con->prepare("
            INSERT INTO `salary`(`org_id`, `user_id`, `salary`, `IIN`, `socialais_nod`, `darba_dev_izmaksas`, `year`, `month` )
            VALUES (?,?,?,?,?,?,?,?)");

        $response = false;
        if($pre_stmt !== FALSE){

            $pre_stmt->bind_param("iissssss", $organization_id, $user_id, $salary, $IIN, $darbiniekaVSAOI, $darbaDevejaIzmaksas, $salaryYear, $salaryMonth);
            $result = $pre_stmt->execute() or die($this->con->error);
            $response = true;
        } else {
            die('prepare() failed: ' . htmlspecialchars($this->con->error));
        }

        return $response;
    }

    public function loadCurrentUserSalary(){
        $userId = $_SESSION["userid"];

        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        $res = $this->con->query("SELECT * FROM salary WHERE user_id = $userId ORDER BY year");


        foreach($res as $row){
            $salary = $row["salary"];
            $IIN = $row["IIN"];
            $socNod = $row["socialais_nod"];
            $count = $salary - $IIN - $socNod;
            $darbaDevejaIzmaksas = $row["darba_dev_izmaksas"];
            $salaryYear = $row["year"];
            $salaryMonth = $row["month"];

            echo '<tr>
                  <td>'.$salary.'</td>
                  <td>'.$IIN.'</td>
                  <td>'.$socNod.'</td>
                  <td>'.$count.'</td>
                  <td>'.$darbaDevejaIzmaksas.'</td>
                  <td>'.$salaryMonth = $row["month"]." ".$salaryYear = $row["year"] .'</td>
                  </tr>';
        }


    }
}
