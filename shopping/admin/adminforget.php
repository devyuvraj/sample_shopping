<?php
include("../includes/config.php");
$status = "";
if(isset($_POST["sub"]))
{
    extract($_POST);
    $qry = "SELECT * FROM admininfo WHERE email = '$email'";
    $rs = $con-> readrecord($qry);
    if(mysqli_num_rows($rs) > 0)
    {
        $row = mysqli_fetch_array($rs);
		$status.="<h4>userid: $row[userid]</h4>";
		$status.="<h4>password: $row[password]</h4>";
		$status.="<h5><a href='adminlogin.php'>Back To Login</a></h5>";
    }
    else
    {
        $status = "<h4>Record Not Found!</h4>";
    }
}
?>
<!doctype html>
<html lang="en-us">
<head>
<title>Shoping Portal</title>
<!-- Custom styles for Admin Dashboard -->
	<link href="simple-sidebar.css" rel="stylesheet">
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#F2F2F2";>
<!--navbar top-->
<nav class="navbar navbar-expand-lg navbar-light shadow bg-light">
	    <a class="navbar-brand" href="adminlogin.php" title="Admin">Shopping Portal.</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
		    </button>
<div class="collapse navbar-collapse" id="navbarToggler">
 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
 </ul>
 <ul class="navbar-nav">
    </ul>
    </div>
</nav>
<!--//navbar top-->
<!--Admin password reset form-->
<div class="container">
	<div class="row" id="login-container">
		<div class="col-lg-3"><!--use for left space left side-->
		</div>
		<div class="col-sm-6">
			<form class="text-center p-3 border border-secondary" method="post" id="frm" name="frm">
				<h3 class="text-center py-2 text-info">Reset your password</h3>
				<p>To reset your password, enter your email.</p>
				<input type="text" id="email" name="email" class="form-control mb-4" placeholder="Enter E-mail" required />
				<input type="submit" class="btn btn-info btn-block my-4" id="sub" name="sub" value="Submit" />
			</form>
		</div>
		<div class="col-lg-3"><!--use for left space right side-->
		</div>
	</div>
</div>
<h4 class="text-warning font-weight-bold text-center"><?php echo $status; ?></h4>
<!--footer-->
	<?php include("footer.php") ?>
<!--footer end-->
</body>
</html>