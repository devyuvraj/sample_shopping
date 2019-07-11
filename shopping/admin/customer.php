<?php
include("../includes/config.php");
session_start();
if(isset($_SESSION["user"]))
{
}
else
{
    header("location:adminlogin.php");
}
?>
<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Shoping Portal::Admin</title>
    <!-- Custom styles for Admin Dashboard -->
    <link href="simple-sidebar.css" rel="stylesheet">
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#EDF7F5";>
<div class="d-flex" id="wrapper">
    <!--Sidebar-->
        <?php include("sidebar.php"); ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <!--Navbar-->
      <?php include("navbar.php"); ?>
    <!--//Navbar-->
      <div class="container-fluid">
        <h1 class="mt-2 font-weight-bold text-primary display-6">Customers</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 table-responsive shadow">
            <form class="form-inline" id="frm" name="frm" action="" method="post" >
                <div class="md-form my-4">
                    <input class="form-control" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
                </div>
                <button type="submit" class="btn btn-outline-dark btn-md my-0 ml-sm-2" id="btnsearch" name="btnsearch">Search</button>
            </form>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>Zip</th>
                            <th>State</th>
                            <th>Contact No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $search = "";
                            if(isset($_POST["btnsearch"]))
                            {
                                $search = $_POST["search"];
                            }
                            $qry = "SELECT * FROM customerinfo WHERE fullname LIKE '%$search%'";
                            $rs = $con->readrecord($qry);
                            while($row = mysqli_fetch_array($rs))
                            {
                                $id = $row["id"];
                                $fullname = $row["fullname"];
                                $email = $row["email"];
                                $password = $row["password"];
                                $street = $row["street"];
                                $city = $row["city"];
                                $zip = $row["zip"];
                                $state = $row["state"];
                                $contactno = $row["contactno"];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $password; ?></td>
                            <td><?php echo $street; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $zip; ?></td>
                            <td><?php echo $state; ?></td>
                            <td><?php echo $contactno; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
<!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
<!--/Menu Toggle Script -->
<!--footer-->
    <?php include("footer.php") ?>
<!--//footer-->
</body>
</html>