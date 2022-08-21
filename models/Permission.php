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

    public static function PermIdCheck($perm_desc){// returns Permssion from slug
        $db = new Database();
        $sql="SELECT permissions.perm_id FROM permissions where 'perm_desc'=:perm_desc";
        $stmt=$db->conn->prepare($sql);
        $data=$stmt->execute(array(':perm_desc'=>$perm_desc));
        return $perm_desc;
        
    }
    public static function hasPermission($perm_desc,$role_name){// returns true if given string has said desc
        $db = new Database();
        $sql="SELECT count(perm_id) AS perm_count, perm_id FROM permissions WHERE perm_desc = :perm_desc";
        $stmt=$db->conn->prepare($sql);
        $stmt->execute(array(":perm_desc" => $perm_desc));
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            if ($row["perm_count"] > 0) {
                return true;
            }
        }
        return false;
    }

  
    
}