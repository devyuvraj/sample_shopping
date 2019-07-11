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
    /*update admininfo*/
    if(isset($_POST["sub"]))
    {
        extract($_POST);
        $qry = "UPDATE admininfo SET password = '$psw', email = '$email', mobile = '$mblno', name = '$name', address = '$adrs', secqstn = '$secqst', secqans = '$secqans'";
        $rs = $con->executequery($qry);
        if($rs == "success")
        {
            $status = "Record Update Successfully!";
        }
        else
        {
            $status = "Error To Update Record!";
        }
    }
/*readrecord from admin info*/
    extract($_POST);
    $qry = "SELECT * FROM admininfo";
    $rs = $con->readrecord($qry);
	$row = mysqli_fetch_array($rs);
	$id = $row["userid"];
	$psw = $row["password"];
    $email = $row["email"];
    $mblno = $row["mobile"];
    $name = $row["name"];
	$adrs = $row["address"];
	$secqst = $row["secqstn"];
	$secqans = $row["secqans"];
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
    <h1 style="font-family: 'Work Sans', sans-serif;" class="display-6 text-primary text-center mt-3">Admin Profile</h1>
        <hr class="my-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
        <form class="mb-3" id="frm" name="frm" method="post">
			<!--Customer Personal Information-->
			<div class="form-row">
				<div class="form-group col-md-6">
                    <label for="id">User Id</label>
                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $id; ?>" readonly />
                </div>
                <div class="form-group col-md-6">
					<label for="psw">Password</label>
					<input type="text" id="psw" name="psw" class="form-control" value="<?php echo $psw; ?>" autocomplete="off" />
				</div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="mblno">Mobile No</label>
                    <input type="text" class="form-control" id="mblno" name="mblno" value="<?php echo $mblno; ?>" required autocomplete="off">
                </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required autocomplete="off" />
				</div>
				<div class="form-group col-md-6">
					<label for="adrs">Address</label>
					<input type="text" id="adrs" name="adrs" class="form-control" value="<?php echo $adrs; ?>" required autocomplete="off" />
				</div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="secqst">Security Question</label>
                    <select id="secqst" name="secqst" class="form-control">
						<option selected>Choose Question..</option>
						<option>In what city or town was your first job?</option>
						<option>What is the name of the company of your first job?</option>
						<option>What was your dream job as a child?</option>
                    </select>
				</div>
				<div class="form-group col-md-6">
					<label for="mobile">Security Answer</label>
					<input type="text" id="secqans" name="secqans" class="form-control" value="<?php echo $secqans; ?>" required autocomplete="off" />
				</div>
			</div>
			<!--//Customer Personal Information-->
            <input type="submit" class="btn btn-outline-warning btn-md my-2 btn-block" id="sub" name="sub" value="Update" />
            <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
        </form>
    </div>
<!--profile section end--->
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