<?php


class Role{

    private $con;

    function __construct(){
        include_once("database/db.php");
        $db = new Database();
        $this->con = $db ->connect();
    }

    public function superAdmin(){

        $userId = $_SESSION["userid"];

        $result = $this->con->prepare("
                SELECT role
                FROM users
                WHERE id = $userId
        ");

        $result->execute();
        $result->store_result();
        $result->bind_result($userRole);
        $result->fetch();

        if ($userRole == "Superadmin" ){
            return true;
        }

    }

	public function admin(){

        $userId = $_SESSION["userid"];

        $result = $this->con->prepare("
                SELECT role
                FROM users
                WHERE id = $userId
        ");

        $result->execute();
        $result->store_result();
        $result->bind_result($userRole);
        $result->fetch();

        if ($userRole == "Admin" ){
            return true;
        }


    }

    public function user(){

        $userId = $_SESSION["userid"];

        $result = $this->con->prepare("
                SELECT role
                FROM users
                WHERE id = $userId
        ");

        $result->execute();
        $result->store_result();
        $result->bind_result($userRole);
        $result->fetch();

        if ($userRole == "User" ){
            return true;
        }


    }

        // Reģistrācijas lapā ielādē iekš dropdown organizācijas
        public function loadRoleInDropdown(){
            include_once("database/db.php");
            $db = new Database();
            $this->con = $db->connect();

            $res = $this->con->query("SELECT DISTINCT role FROM `users` ORDER BY ROLE");
            foreach($res as $row){
                $value = $row["role"];
                $name = $row["role"];
                echo "<option value='$value'>$name</option>";
            }
        }

}
