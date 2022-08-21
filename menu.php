<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/index.php">Home </a>
      </li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Welcome </p></li>
        <?php require_once 'models/User.php';
        if($_GET['logout']){
          User::logout();
        }
        ?>
        <li>
          <form action="#" method="get">
            <button class="btn btn-primary" value='logout' type='submit' name='logout'>Logout</button>
          </form>
        </li>
    </ul>
  </div>
</nav>