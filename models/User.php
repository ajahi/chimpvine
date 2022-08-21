<?php
require_once 'Database.php';

class User{
    public $user_id;
    public $username;
    public $email;
    private $password;

    

    public static function validate($email, $password)
    {
        $db = new Database();
        $result=array();
        $sql = "SELECT `user_id`, `username`, `password`, `email`, `created_on` FROM `users` WHERE `email` = '$email' ";
        
        $stmt= $db->conn->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($result,$row);
        }   
        $fetch_password=$result[0]['password'];
        
        if(password_verify($password,$fetch_password)){
            $user = new User();
            $user->user_id = $result[0]["user_id"];
            $user->username = $result[0]["username"];
            $user->email = $result[0]["email"];
           
            return $user;
        }
        return false;
        
        
    }
    
    public static function assignRole($user_id,$role_id){
        $db = new Database();
        $sql="INSERT INTO `user_role`(`user_id`, `role_id`) VALUES (:user_id,:role_id)";
        $stmt = $db->conn->prepare(sql);
        $stmt->execute((
            array(
                ":user_id" => $user_id , 
                ":role_id" => $role_id
                )
        ));
        header('Location:../../index.php');
    }
    public static function logout(){//logsout
        session_start();

        session_unset();

        session_destroy();

        header("Location:../role_permission/login.php");
    }

    public  function checkUserPerm($perm_desc){//checks if user has said permission
        $perm_id=$this->GetPermId($perm_desc);
        $db = new Database();
      
        $sql="SELECT user_role.user_id,role_perm.perm_id
            from user_role join role_perm
            ON
            user_role.role_id=role_perm.role_id";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row["user_id"]==$this->user_id && $row['perm_id']==$perm_id) {
                return true;
            }
        }
        
        return false;
    }

    public function GetPermId($perm_desc){// return permission_id of permissions using slug;
        $db = new Database();
        $sql=" SELECT permissions.perm_id from permissions where perm_desc = (:perm_desc) ";
        $stmt=$db->conn->prepare($sql);
        $stmt->bindParam(':perm_desc', $perm_desc);
        $stmt->execute();
      
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        return $data['perm_id'];
        
    } 
}