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
    require_once '../../menu.php'?>   
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Create a Permission</h1>
    
  </div>
</div>
<form action='' method='post'>
  <div class="form-group">
    <label for="exampleInputEmail1">Permission name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require_once '../components/footer.php'?>  