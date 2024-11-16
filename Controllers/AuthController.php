<?php
require_once '../../Models/User.php';
require_once '../../Controllers/DBController.php';
class AuthController
{
    protected $db;

    public function login(User $user)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "select * from signin where phonenum='$user->phonenumber' and password='$user->password'";
            $result = $this->db->select($query);
            if ($result===false) 
            {
                echo "Error in query!";
                return false;
            }
            else 
            {
                if(count($result)==0){
                    session_start();
                    $_SESSION["errMsg"]="You have entered wrong email or password !";
                    return false;
                }else{

                    session_start();
                   // $_SESSION["userID"]=$result[0]["id"];
                    //$_SESSION["userName"]=$result[0]["name"];
                    //$_SESSION["userRole"]=$result[0]["roleID"];
                   // echo"Loggedin";
                    return true;
                }


            }
        } else {
            echo "Error in database connection";
            return false;
        }
    }

}

?>