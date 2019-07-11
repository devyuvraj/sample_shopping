<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-primary" href="customerdashbord.php" style="font-size: 22px;">Shopping</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav pull-sm-left mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../visitor/contactus.php">Contact</a>
      </li>
    </ul>
    <!--
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="far fa-user"></i> <?php/* echo $_SESSION["fullname"]; */?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customerprofile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>-->
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <form class="form-inline my-2 my-lg-0" id="frm" name="frm" action="" method="post">
        <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Enter Product Name.." aria-label="Search" autocomplete="off" />
        <button class="btn btn-outline-primary my-2 my-sm-0" id="btnsearch" name="btnsearch" type="submit">Search</button>
      </form>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-cart-plus"></i> Cart</a>
      </li>
      <li class="nav-item avatar dropdown">
        <a href="" class="nav-link dropdown-toggle" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-user"></i> <?php echo $_SESSION["fullname"]; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user">
          <a class="nav-link dropdown-item" href="customerprofile.php" title="View Profile"><i class="fas fa-user"></i> Profile</a>
          <a class="nav-link dropdown-item" href="logout.php" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>