<?php
require_once 'Database.php';

class Permission{
    public static function getAllPerms(){
        $db = new Database();
        $perms=array();
        $sql='SELECT * FROM `permissions` WHERE 1';
        $stmt=$db->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            array_push($perms, $row);
        }

        return $perms;


    }


  
    
}