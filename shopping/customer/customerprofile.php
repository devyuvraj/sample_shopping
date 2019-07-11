<?php
include("../includes/config.php");
session_start();
if(isset($_SESSION["email"]))
{
}
else
{
    header("location:customerlogin.php");
}
/*update customer*/
$status = "";
$id = $_SESSION["id"];
if(isset($_POST["sub"]))
{
	extract($_POST);
	$qry ="UPDATE customerinfo SET fullname = '$fname', email = '$email', password = '$psw', street = '$street', city = '$city', zip = '$zip', state = '$state', contactno = '$contactno' WHERE id = $id";
    $rs = $con->executequery($qry);
    if($rs == "success")
    {
        $status ="Record Updated Successfully";
    }
    else
    {
        $status ="Record Updated Faild!";
	}
}
/*readrecord from customer database*/
extract($_POST);
$qry = "SELECT * FROM customerinfo WHERE id = '$id'";
$rs = $con->readrecord($qry);
$row = mysqli_fetch_array($rs);
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
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping::Customer | Profile</title>
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#EDF7F5";>
<!--Customer Profile page-->
<!--navbar top-->
	<?php include("navbar.php"); ?>
<!--navbar end-->
<!--Customer Profile--->
<div class="container shadow p-1">
    <h1 class="display-6 text-primary text-center mt-3">Profile</h1>
        <hr class="my-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
        <form class="mb-3" id="frm" name="frm" method="post">
			<div class="form-row">

			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
                    <label for="id">Id</label>
                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $id; ?>" readonly="true" />
                </div>
				<div class="form-group col-md-4">
					<label for="fname">Full Name</label>
					<input type="text" id="fname" name="fname" class="form-control" value="<?php echo $fullname; ?>" required autocomplete="off" />
				</div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required autocomplete="off" />
                </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="psw">Password</label>
					<input type="text" id="psw" name="psw" class="form-control" value="<?php echo $password; ?>" autocomplete="off" required />
				</div>
				<div class="form-group col-md-4">
					<label for="street">Street</label>
					<input type="text" id="street" name="street" class="form-control" value="<?php echo $street; ?>" autocomplete="off" required />
				</div>
				<div class="form-group col-md-4">
					<label for="city">City</label>
					<input type="text" id="city" name="city" class="form-control" value="<?php echo $city; ?>" autocomplete="off" required />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="zip">Zip</label>
					<input type="text" id="zip" name="zip" class="form-control" value="<?php echo $zip; ?>" autocomplete="off" required />
				</div>
				<div class="form-group col-md-4">
					<label for="state">State</label>
					<input type="text" id="state" name="state" class="form-control" value="<?php echo $state; ?>" autocomplete="off" required />
				</div>
				<div class="form-group col-md-4">
					<label for="contactno">Contact No</label>
					<input type="text" id="contactno" name="contactno" class="form-control" value="<?php echo $contactno; ?>" autocomplete="off" required />
                </div>
			</div>
            <input type="submit" class="btn btn-outline-warning btn-block my-2" id="sub" name="sub" value="Update" />
            <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
        </form>
    </div>
</div>
<!--//Customer Profile--->
<!--footer-->
	<?php include("footer.php"); ?>
<!--footer end-->
</body>
</html>
