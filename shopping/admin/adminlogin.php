<?php
session_start();
include("../includes/config.php");
$status = "";
if(isset($_POST["sub"]))
{
    extract($_POST);
	$qry = "SELECT * FROM admininfo WHERE userid = '$user' AND password = '$psw'";
	echo $qry;
    $rs = $con->readrecord($qry);
    if(mysqli_num_rows($rs) > 0)
    {
        $_SESSION["user"]=$user;
        $row = mysqli_fetch_array($rs);
        header("location:admindashbord.php");
    }
    else
    {
        $status ="Invalid Id And Password";
    }
}
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Login::Shopping Portal.</title>
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#F2F2F2";>
<!--Admin login form-->
<div class="container-fluid mb-4">
	<div class="row" id="login-container">
		<div class="col-lg-3"><!--use for left space left side-->
		</div>
		<div class="col-lg-6 shadow">
			<form class="text-center p-3" method="post" id="frm" name="frm">
				<h1 class="text-center py-2 text-info"><i class="fas fa-user-edit"></i> Admin</h1>
				<p>To access this page, you have to log in.</p>
				<input type="text" id="user" name="user" class="form-control mb-4" placeholder="User-Id" required autocomplete="off" />
				<input type="password" id="psw" name="psw" class="form-control mb-4" placeholder="Password" required autocomplete="off" />
				<div class="d-flex justify-content-around">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" />
						<label class="custom-control-label" for="remember">Remember me</label>
					</div>
					<div>
						<a href="adminforget.php">Forget Password?</a>
					</div>
				</div>
				<input type="submit" class="btn btn-outline-success btn-block my-4" id="sub" name="sub" value="Login" />
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
