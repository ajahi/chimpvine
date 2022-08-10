
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body class='container'>    

    <?php
    require_once 'models/Role.php';
    require_once 'models/Permission.php';
    require_once 'models/Database.php';
    require_once 'menu.php'?>    
<p>
  
</p>
    

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
   Roles
   <a href="views/roles/rolecreate.php" class='btn btn-danger btn-sm'>Add Roles</a>

  </a>
  <?php
  $roles = Role::getAllRoles();
  foreach ($roles as $role) {
    ?>
    <a href="#" class="list-group-item list-group-item-action"><?php echo($role['role_name']); ?></a>
    <span class="float-right">
      
      <a href="views/roles/roleedit.php?id=<?php echo $role['role_id']; ?>" class="list-group-item list-group-item-action">
      <i class="fa fa-edit"></i>
      </a>
  </span>
    <?php
  }
?>
  
  
</div>

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Permissions
    <a href="views/permissions/permissioncreate.php" class='btn btn-danger btn-sm'>Add Permissions</a>
  </a>
  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
</div>
    

<?php require_once 'views/components/footer.php'?>    
