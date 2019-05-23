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
        if($apliekamaSumma < 0){
          $IIN = 0;
        }else{
          $IIN = $apliekamaSumma * 0.20;
        }

        $riskaNodeva = 0.36;
        $darbaDevejaIzmaksas = $salary + $darbaDevejaVSAOI + $riskaNodeva;

        $pre_stmt = $this->con->prepare("
            SELECT *
            FROM salary
            WHERE year = ?
            AND month = ?
            AND user_id = ?");

        $pre_stmt->bind_param("isi", $salaryYear, $salaryMonth, $user_id);
        $pre_stmt->execute();
        $result = $pre_stmt->get_result();
        $count = $result->num_rows;

        $pre_stmt2 = $this->con->prepare("
            UPDATE salary
            SET salary=?, IIN=?, socialais_nod=?, darba_dev_izmaksas=?
            WHERE user_id=?
            AND year=?
            AND month=?");

        $pre_stmt3 = $this->con->prepare("
            INSERT INTO `salary`(`org_id`, `user_id`, `salary`, `IIN`, `socialais_nod`, `darba_dev_izmaksas`, `year`, `month` )
            VALUES (?,?,?,?,?,?,?,?)");

        // Ja tabulā jau pievienota alga konkrētajam mēnesim/gadam pārrakstam ievadītās algas vērtības
        // Ja nav tad izveido jaunu ierakstu
        $response = false;

        if($count >= 1){
            if($pre_stmt2 !== FALSE){

                $pre_stmt2->bind_param("ssssiis", $salary, $IIN, $darbiniekaVSAOI, $darbaDevejaIzmaksas, $user_id, $salaryYear, $salaryMonth);
                $result = $pre_stmt2->execute();
                $response = true;

            } else{
                die('prepare() failed: ' . htmlspecialchars($this->con->error));
            }

        } else {
            if($pre_stmt3 !== FALSE){
                $pre_stmt3->bind_param("iissssis", $organization_id, $user_id, $salary, $IIN, $darbiniekaVSAOI, $darbaDevejaIzmaksas, $salaryYear, $salaryMonth);
                $result = $pre_stmt3->execute();
                $response = true;
                // $response = true;
            } else{
                die('prepare() failed: ' . htmlspecialchars($this->con->error));
            }

        }

        return $response;

    }

    public function loadCurrentUserSalary(){
        $userId = $_SESSION["userid"];

        include_once("database/db.php");
        $db = new Database();
        $this->con = $db->connect();

        // $res = $this->con->query("SELECT * FROM salary WHERE user_id = $userId ORDER BY year");
        $res = $this->con->query("
            SELECT * FROM salary
            WHERE user_id = $userId
            ORDER BY year,
            CASE salary.month
              WHEN 'Janvāris' THEN 1
              WHEN 'Februāris' THEN 2
              WHEN 'Marts' THEN 3
              WHEN 'Aprīlis' THEN 4
              WHEN 'Maijs' THEN 5
              WHEN 'Jūnijs' THEN 6
              WHEN 'Jūlijs' THEN 7
              WHEN 'Augusts' THEN 8
              WHEN 'Septembris' THEN 9
              WHEN 'Oktobris' THEN 10
              WHEN 'Novembris' THEN 11
              WHEN 'Decembris' THEN 12
            END;");

        if($res !== FALSE){

        }else{
          die('prepare() failed: ' . htmlspecialchars($this->con->error));
        }

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
