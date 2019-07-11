<?php
include("../includes/config.php");
$status = "";
if(isset($_POST["sub"]))
{
    extract($_POST);
    $qry = "INSERT INTO orderinfo
    (
        name, email, street, city, zip, state, phoneno, paymethod
    )
    VALUES
    (
        '$fname', '$email', '$street', '$city', '$zip', '$state', '$phno', '$paymentMethod'
    )";
$rs = $con->executequery($qry);
if($rs == "success")
{
    $status = "Order Place Successfully";
}
else
{
    $status = "Order Faild Try Again!";
}
}
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping | Checkout</title>
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
        <h2 class="font-weight-bold text-uppercase text-center display-4">Check - Out</h2>
        <hr>
        <h4 class="font-weight-bold my-4">INVOICE ADDRESS</h4>
        <form action="" method="post" id="frm" name="frm">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="fname">Name *</label>
                    	<input type="text" class="form-control" id="fname" name="fname" placeholder="eg. John Doe" required autocomplete="off">
					</div>
					<div class="form-group col-md-6">
                        <label for="email">Your Email *</label>
                    	<input type="email" class="form-control" id="email" name="email" placeholder="eg. john@mail.com" required autocomplete="off">
					</div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-6">
						<label for="street">Street *</label>
                    	<input type="text" class="form-control" id="street" name="street" placeholder="123 Main St." required autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
						<label for="city">City *</label>
                    	<input type="text" class="form-control" id="city" name="city" placeholder="City" required autocomplete="off">
					</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="zip">Zip *</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State *</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phno">Phone No *</label>
                        <input type="text" class="form-control" id="phno" name="phno" placeholder="Phone No" required autocomplete="off">
					</div>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <h4 class="font-weight-bold my-4">Payment Method</h4>
                <hr>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit" name="paymentMethod">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit" name="paymentMethod">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal" name="paymentMethod">Cash On Delivery</label>
                    </div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-6">
                        <label for="state">Name On Card*</label>
                        <input type="text" class="form-control" id="crdname" name="crdname" placeholder="eg. John Doe" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="crdno">Card No *</label>
                        <input type="text" class="form-control" id="crdno" name="crdno" placeholder="1650 1124 4875 25XX" required autocomplete="off">
					</div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-4">
                        <label for="crdexpdt">Expiry Date*</label>
                        <input type="text" class="form-control" id="crdexpdt" name="crdexpdt" placeholder="MM/YY" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cvv">CVV Number *</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required autocomplete="off">
                    </div>
                </div>
                <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
                <button type="submit" name="sub" id="sub" class="btn btn-outline-dark btn-md my-2">
                <i class="fas fa-paper-plane"></i>
					Check-Out
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