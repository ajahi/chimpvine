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
    if($_POST){
        Role::createRole($_POST['role_name']);
        
    }
    ?>   

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Create a Role</h1>
    
  </div>
</div>
<form action='#' method='POST'>
  <div class="form-group">
   
    <label for="exampleInputEmail1">Role name</label>
    <input type="text" class="form-control" id="name" name="role_name" 
     placeholder="Enter email">
  </div>
  
  
  <input value="Add" type="submit" name="add" class="btn btn-primary">
</form>
<?php require_once '../components/footer.php'?>  