<?php

class Role{

    public static function createRole($role_name){
        $db = new Database();
        $sql = "INSERT INTO roles (role_name) VALUES (:role_name)";
        $sth = $db->conn->prepare($sql);
        $sth->execute(array(":role_name" => $role_name));
        return redirect('../index.php');
    }

    public static function getAllRoles(){
        $db = new Database();
        $roles = array();
        $sql="SELECT * FROM `roles` where 1";

        $statement=$db->conn->prepare($sql);
        $statement->execute();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            
            array_push($roles, $row);
        }

        return $roles;
    }



    public static function getSingleRole($id){
        $db = new Database();
        $sql = "SELECT * from `roles` WHERE role_id = :id ";
        $sth = $db->conn->prepare($sql);
        $sth->execute(array(":id" => $id));
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $role = $row;
        }
        return $role;
    }

    public static function updateRole($role_name, $id){
        $db = new Database();
        $update_sql = "UPDATE `roles` SET `role_name` = ':role_name' WHERE `roles`.`role_id` = :id  ";
        $stmt = $db->conn->prepare($update_sql);
        $stmt->execute((
            array(
                ":id" => $id , 
                ":role_name" => $role_name
                )
        ));
        return true;
    
        
        

    }
}