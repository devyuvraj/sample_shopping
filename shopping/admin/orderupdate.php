<?php
include("../includes/config.php");
session_start();
$status = "";
if(isset($_SESSION["user"]))
{
}
else
{
    header("location:adminlogin.php");
}

if(isset($_POST["sub"]))
{
    extract($_POST);
    $qry = "UPDATE orderinfo SET deliverystatus = '$status' WHERE id = '$orderid'";
    $rs = $con->executequery($qry);
    if($rs == "success")
    {
        $status = "Order Update Successfully";
    }
    else
    {
        $status = "Faild To Update Order";
    }
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
        <h1 class="mt-2 font-weight-bold text-primary display-6">Order Update</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 table-responsive shadow">
                <form action="" id="frm" name="frm" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="orderid">Order Id</label>
                        <input type="text" class="form-control" id="orderid" name="orderid" value="<?php echo $_GET["id"]; ?>" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="orderdt">Order Date</label>
                        <input type="text" class="form-control" id="orderdt" name="orderdt" value="<?php echo $_GET["orderdate"]; ?>" readonly />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cusname">Customer Name</label>
                        <input type="text" class="form-control" id="cusname" name="cusname" value="<?php echo $_GET["name"]; ?>" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cusno">Customer No</label>
                        <input type="text" class="form-control" id="cusno" name="cusno" value="<?php echo $_GET["phoneno"]; ?>" readonly />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="paymethod">Payment Status</label>
                        <input type="text" class="form-control" id="paymethod" name="paymethod" value="<?php echo $_GET["paymethod"]; ?>" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="billamnt">Bill Amount</label>
                        <input type="text" class="form-control" id="billamnt" name="billamnt" value="<?php echo $_GET["billamount"]; ?>" readonly />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="status" name="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option selected>Choose..</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="In-Transit">In-Transit</option>
                            <option value="Deliverd">Deliverd</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-success btn-md my-2 btn-block" id="sub" name="sub" value="Submit" />
                <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
                </form>
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