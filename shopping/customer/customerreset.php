<?php
include("../includes/config.php");
session_start();
$status = "";
if(isset($_POST["sub"]))
{
    extract($_POST);
    $qry = "SELECT * FROM customerinfo WHERE Email ='$email'";
	$rs = $con->readrecord($qry);
    if(mysqli_num_rows($rs) > 0)
    {
        $row = mysqli_fetch_array($rs);
		$status.="<h4>UserId: $row[email]</h4>";
		$status.="<h4>password: $row[password]</h4>";
		$status.="<h5><a href='Customerlogin.php'>Back To Login</a></h5>";
    }
    else
    {
        $status = "<h4>Please Enter Valid Email!</h4>";
    }
}
?>
<!doctype html>
<html lang="en-us">
<head>
    <title>Shopping | RESET</title>
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#EDF7F5";>
<!--Customer password reset form-->
<div class="container justify-content-center">
	<div class="row mt-4">
		<div class="col-lg-12 shadow">
			<form class="text-center" method="post" id="frm" name="frm">
				<h3 class="text-center py-2 text-info">Reset your password</h3>
				<p class="text-capitalize">To reset your password, enter your email.</p>
				<input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" required autocomplete="off" />
				<input type="submit" class="btn btn-info btn-block my-4" id="sub" name="sub" value="Submit" />
				<h4 class="text-warning font-weight-bold text-center"><?php echo $status; ?></h4>
			</form>
		</div>
	</div>
</div>
<!--footer-->
	<?php include("footer.php"); ?>
<!--footer end-->
</body>
</html>
