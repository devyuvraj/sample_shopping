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
<body style="background-color:#F2F2F2";>
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
        <h1 class="mt-2 font-weight-bold text-primary display-6">Order Managment</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 table-responsive shadow">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Customer Name</th>
                            <th>Customer No</th>
                            <th>Payment Status</th>
                            <th>Bill Amount</th>
                            <th>Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //get Order Details from db
                        $status = "";
                        extract($_POST);
                        $qry = "SELECT * FROM orderinfo";
                        $rs = $con->readrecord($qry);
                        while($row = mysqli_fetch_array($rs))
                        {
                            $id = $row["id"];
                            $orderdate = $row["orderdate"];
                            $name = $row["name"];
                            $phoneno = $row["phoneno"];
                            $paymethod = $row["paymethod"];
                            $billamount = $row["billamount"];
                            $deliverystatus = $row["deliverystatus"];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $orderdate; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $phoneno; ?></td>
                            <td><?php echo $paymethod; ?></td>
                            <td><?php echo $billamount; ?></td>
                            <td><?php echo $deliverystatus; ?></td>
                            <td>
                                <a title="Edit" href="orderupdate.php?id=<?php echo $id; ?>&orderdate=<?php echo $orderdate; ?>&name=<?php echo $name; ?>&phoneno=<?php echo $phoneno; ?>&paymethod=<?php echo $paymethod; ?>&billamount=<?php echo $billamount; ?>&deliverystatus=<?php echo $deliverystatus; ?>">
                                <i class="far fa-edit"></i>
                                </a>
                            </td>
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