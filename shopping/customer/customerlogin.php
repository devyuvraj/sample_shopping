<?php
session_start();
include("../includes/config.php");
$status = "";
//login
if(isset($_POST["login"]))
{
    extract($_POST);
    $qry = "SELECT * FROM customerinfo WHERE email = '$email' AND password = '$psw'";
    $rs = $con->readrecord($qry);
    if(mysqli_num_rows($rs) > 0)
    {
		$row = mysqli_fetch_array($rs);
		$id = $row["id"];
		$user = $row["email"];
		$name = $row["fullname"];
		$_SESSION["id"] = $id;
		$_SESSION["email"] = $email;
		$_SESSION["fullname"] = $name;
		header("location:customerdashbord.php");
    }
    else
    {
        $status = "Invalid Email And Password!";
    }
}
//signup
if(isset($_POST["signup"]))
{
	extract($_POST);
	$qry = "INSERT INTO customerinfo
	(
		fullname, email, password
	)
	VALUES
	(
		'$name', '$email', '$psw'
	)";
	$rs = $con->executequery($qry);
	if($rs == "success")
	{
		$status = "Successfully Resgisterd";
	}
	else
	{
		$status = "Register Faild";
	}
}
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping::Customer</title>
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#F2F2F2";>
<!--navbar top-->
	<?php include("../includes/navbar.php"); ?>
<!--//navbar top-->
<!--//Customer login & SignUp Section-->
<div class="container">
	<h1 class="dispaly-1 text-center font-weight-bold mb-4 text-break">C U S T O M E R &nbsp;  Z O N E</h1>
	<div class="row justify-content-center">
		<!--Login Section-->
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
			<h5>
				Login
			</h5>
			<p class="text-muted">
				Already our customer?
			</p>
			<hr>
			<form action="" method="post" id="frm1" name="frm1">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="email">Email</label>
                    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email" required autocomplete="off">
					</div>
					<div class="form-group col-md-12">
						<label for="psw">Password</label>
                    	<input type="password" class="form-control" id="psw" name="psw" placeholder="Enter Your Password" required autocomplete="off" />
					</div>
					<div class="form-group col-md-12 justify-content-right">
					<div>
						<a href="customerreset.php">Forget Password?</a>
					</div>
					</div>
					<button type="submit" name="login" id="login" class="btn btn-outline-dark btn-md my-2">
						<i class="fa fa-sign-in-alt mr-2"></i> &nbsp;
						Log In
					</button>
				</div>
			</form>
		</div>
		<!--Login Section-->

		<!--Signup / register Section-->
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
			<h5>
				SignUp
			</h5>
			<p class="text-muted">
				Not our registered customer yet?
			</p>
			<hr>
			<form action="" id="frm2" name="frm2" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="name">Full Name</label>
						<input type="name" class="form-control" id="name" name="name" placeholder="Enter Your Full Name" required autocomplete="off" />
					</div>
					<div class="form-group col-md-12">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email" required autocomplete="off" />
					</div>
					<div class="form-group col-md-12">
						<label for="psw">Password</label>
						<input type="password" class="form-control" id="psw" name="psw" placeholder="Enter Your Password" required autocomplete="off" />
					</div>
				</div>
				<button type="submit" name="signup" id="signup" class="btn btn-outline-dark btn-md my-2">
					<i class="fas fa-user-plus"></i> &nbsp;
					Register
				</button>
			</form>
		</div>
		<!--Signup / register Section-->
	</div>
	<h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
</div>
<!--//Customer login & SignUp Section-->
</body>
</html>
