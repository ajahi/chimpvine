<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
</head>
<body class='container'>
<?php
    require_once '../../menu.php';
    require_once '../../models/Database.php';
    require_once '../../models/Role.php';
    require_once '../../models/Permission.php';
   $role_id=$_GET['id'];
   $role=Role::getSingleRole($role_id);
   $permissions=Permission::getAllPerms();
    ?>   

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Assign permission to role ,<?php print_r($role['role_name']);?></h1>
    
  </div>
</div>
<form action='#' method='POST'>

  <div class="form-group">
    <?php foreach($permissions as $permission){ ?>
   <input type="checkbox" name="" id="" value=<?php $permision['id'];?>>
    <label for="exampleInputEmail1"><?php print_r($permission['perm_desc']);?></label><br>

    
<?php
    }
?>
  </div>
  
  
  <input value="Assign Permission" type="submit" name="" class="btn btn-primary">
</form>
<?php require_once '../components/footer.php'?>  