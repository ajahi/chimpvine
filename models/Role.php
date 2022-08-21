<?php

class Role{

    public static function createRole($role_name){
        $db = new Database();
        $sql = "INSERT INTO roles (role_name) VALUES (:role_name)";
        $sth = $db->conn->prepare($sql);
        $sth->execute(array(":role_name" => $role_name));
         header('Location:../../index.php');
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
        $update_sql = "UPDATE `roles` SET `role_name` = :role_name WHERE `roles`.`role_id` = :id  ";
        $stmt = $db->conn->prepare($update_sql);
        $stmt->execute((
            array(
                ":id" => $id , 
                ":role_name" => $role_name
                )
        ));
        header('Location:../../index.php');
    }
    public  static function destroy($id){
        $db = new Database();
        $sql="DELETE t1, t2, t3 FROM roles AS t1
        JOIN user_role AS t2 
        ON t1.role_id = t2.role_id
        JOIN role_perm AS t3 
        ON t1.role_id = t3.role_id
        WHERE t1.role_id = :role_id";
        $stmt=$db->conn->prepare($sql);
        $stmt->bindParam(":role_id", $role_id, PDO::PARAM_INT);
        foreach($roles as $role_id){
            $stmt->execute();
        }
        
        return true;
    }
    public static function getAllAssignedPerm(string $perm_string){
        $db = new Database();
        $sql= 'SELECT 
        roles.role_name, 
        perm.perm_desc 
        FROM roles 
        JOIN role_perm 
        ON roles.role_id=role_perm.role_id 
        JOIN permissions AS perm 
        ON perm.perm_id=role_perm.perm_id';
                
        $role=array();
        $stmt=$db->conn->prepare($sql);
        $rows=$stmt->execute();
        
        foreach($rows as $row){
            if($row['perm_desc']==$perm_string){
                return true;
            }
        }
        return false;
    }
}