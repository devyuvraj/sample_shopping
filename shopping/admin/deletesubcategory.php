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
    $status="";
    /*Update sub category*/
    if(isset($_POST["sub"]))
    {
        extract($_POST);
        $qry = "DELETE FROM subcategoryinfo WHERE catid ='$catid' ";
        $rs = $con->executequery($qry);
        if($rs == "success")
        {
            $status = "Sub Category Update Successfully";
        }
        else
        {
            $status = "Error To Update!";
        }
    }
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping Portal | Admin::.</title>
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
      <div class="container-fluid p-1 mt-2">
    <h1 style="font-family: 'Work Sans', sans-serif;" class="display-6 text-primary text-center mt-3">Delete Sub Category</h1>
        <hr class="my-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
        <form class="mb-2" id="frm" name="frm" method="post">
        <div class="form-row">
				<div class="form-group col-md-12">
                    <label for="catid">Category Id</label>
                    <input type="text" class="form-control" id="catid" name="catid" value="<?php echo $_GET["catid"]; ?>" readonly >
                </div>
			</div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="catname">Category Name</label>
                    <input type="text" class="form-control" id="catname" name="catname" value="<?php echo $_GET["catname"]; ?>" readonly >
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
                    <label for="subcatname">Sub Category Name</label>
                    <input type="text" class="form-control" id="subcatname" name="subcatname" value="<?php echo $_GET["subcatname"]; ?>" readonly >
                </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-12">
                    <label for="catdescrptn">Description</label>
                    <textarea class="form-control" id="catdescrptn" name="catdescrptn" cols="30" rows="10" value="<?php echo $_GET["catdescription"]; ?>" readonly ></textarea>
                </div>
			</div>
            <input type="submit" class="btn btn-outline-danger btn-md my-2 btn-block" id="sub" name="sub" value="Update" />
            <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
        </form>
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
<!--footer-->
    <?php include("footer.php") ?>
<!--//footer-->
</body>
</html>