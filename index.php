<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Role_access control</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  <?php
  require_once 'models/Role.php';
  require_once 'models/Permission.php';
  require_once 'models/Database.php';
  require_once 'models/User.php';
  require_once 'menu.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();

}

$u=isset($_SESSION['user']->username);

if(!$u){   
    header('Location:login.php');
  }

  require_once 'menu.php';

    $USER= $_SESSION['user'];
    ?>
  <div class="list-group container">
      <a href="#" class="list-group-item list-group-item-action active">
      Roles
      <?php
      if($USER->checkUserPerm('add_role')){
      ?>
      <a href="views/roles/rolecreate.php" class='btn btn-danger btn-sm'>Add Roles</a>
      <?php
       }
      ?>
      </a>
      <p></p>
      <?php
      
      if($_POST){
        Role::destroy($role['role_id']);

      }
      $roles = Role::getAllRoles();

      if(!$USER->checkUserPerm('view_role')){
        ?>
        <a href="#" class="list-group-item list-group-item-action"><?php print_r($USER->username); ?> ,You are not permitted to View Roles. to view roles change permission to 'view_role' in index.php.</a>
      <?php
      }else{
        foreach ($roles as $role) {
        
          ?>
          <a href="#" class="list-group-item list-group-item-action"><?php print_r($role['role_name']); ?></a>
          <span class="float-right">
          
            
            <a href="views/roles/roleedit.php?id=<?php echo $role['role_id']; ?>" class="list-group-item list-group-item-action">
          <button class="btn btn-primary">EDIT</button>
            </a>
            <form action="#" method='POST'>
              <button type="submit" class='btn btn-danger' name='delete'>DELETE</button>
            </form>
            
        </span>
          <?php
        }
      }
     
     
    ?>
      
      
    </div>

    <div class="list-group container">
      <a href="#" class="list-group-item list-group-item-action active">
        Permissions
        
      <?php 
      $perms=Permission::getAllPerms();
      if(!$user->checkUserPerm('view_permission')){
        ?>
            <a href="#" class="list-group-item list-group-item-action">You are not permitted to View Permissions. to view roles change permission to 'view_permission'</a>
        <?php 
        }else{
        foreach($perms as $perm){
          ?>
          <a href="#" class="list-group-item list-group-item-action"><?php  print_r($perm['perm_desc']);?></a>
          <?php
      }
    }
      
        ?>
        
      
    </div>
  <?php
  require_once 'views/components/footer.php'
  ?>
 
</head>
<body>
  
</body>
</html>
  
     
