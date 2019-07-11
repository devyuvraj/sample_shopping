<?php
include("../includes/function.php");
$status = "";
if(isset($_POST["sub"]))
{
    extract($_POST);
    $qry = "INSERT INTO contactusinfo
    (
        firstname, lastname, email, message
    )
    VALUES
    (
        '$fname', '$lname', '$email', '$msg'
    )";
$rs = executequery($qry);
if($rs == "success")
{
    $status = "Message Send Successfully";
}
else
{
    $status = "Faild To Send Message Try Again!";
}
}
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping | Contact Us</title>
<!--Header Links-->
    <?php include("../includes/headlink.php"); ?>
<!--/Header Links-->
</head>

<body style="background-color: #E7F3FF;">
<!--top nav menu-->
    <?php include("../includes/navbar.php"); ?>
<!--/top nav menu-->

<div class="container mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h2 class="font-weight-bold text-uppercase text-center">Contact Form</h2>
        <hr>
        <form action="" method="post" id="frm" name="frm">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="fname">Your First Name *</label>
                    	<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name" required autocomplete="off">
					</div>
					<div class="form-group col-md-6">
						<label for="lname">Your Last Name *</label>
                    	<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name" required autocomplete="off">
					</div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-12">
						<label for="email">Your Email *</label>
                    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required autocomplete="off">
					</div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-12">
                        <label for="msg">YOUR MESSAGE FOR US *</label>
                        <textarea name="msg" class="form-control" id="msg" cols="20" rows="10" placeholder="Enter Your Message.." required autocomplete="off"></textarea>
					</div>
                </div>
                <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
                <button type="submit" name="sub" id="sub" class="btn btn-outline-dark btn-md my-2">
                <i class="fas fa-paper-plane"></i>
					SEND MESSAGE
                </button>
			</form>
        </div>
    </div>
</div>

<!--Service section-->
<?php include("../includes/service.php"); ?>
<!--/service section-->

<!--footer section-->
    <?php include("../includes/footer.php"); ?>
<!--/footer section-->
</body>
</html>