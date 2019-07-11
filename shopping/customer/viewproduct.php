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
?>
<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Shopping | Products</title>
    <?php include("../includes/headlink.php"); ?>
</head>
<body style="background-color:#EDF7F5";>
<!--customer home page-->
<!--navbar top-->
	<?php include("navbar.php"); ?>
<!--/navbar end-->
<!--View Product Details-->
<div class="container">
<h3 class="h3 text-center">Products </h3>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <form action="" method="post" id="frm" name="frm">
                <div class="card">
                    <h6 class="card-title bg-info text-white p-2">
                        <?php echo $_GET["productname"]; ?>
                    </h6>
                    <div class="card-body">
                        <img src="<?php echo "../admin/".$_GET["photo"]; ?>" alt="product" class="img-fluid mb-2">
                        <h6 class="badge badge-success"> 4.4
                            <i class="fa fa-star"></i>
                        </h6>
                            <span>
                                <?php echo $_GET["status"]; ?>
                            </span>
                        <h6>
                            &#8377; <?php echo $_GET["actulprice"]; ?>/- <span>(<?php echo $_GET["discountprice"]; ?>/-)%Off</span>
                        </h6>
                        <textarea name="" id="" cols="55" rows="10" readonly="true" >
                            <?php echo $_GET["productdescription"]; ?>
                        </textarea>
                        <input class="form-control" type="number" min="1" max="1" id="qty" name="qty" value="1" required />
                        <input class="form-control" type="hidden" id="totalamt" name="totalamt" value="1"/>
                        <div class="btn-group d-flex justify-content-center mb-2 mt-2">
                        <!--Add To Cart-->
                            <a href="cart.php?catid=<?php echo $_GET["catid"]; ?>&qty=1&totlamt=<?php echo $_GET["discountprice"]; ?>" class="btn btn-success flex-fill" role="button">Add To Cart</a>
                        <!--//Add To Cart-->
                        <!--Redirect To Checkout-->
                            <a href="cart.php" class="btn btn-warning flex-fill text-white" role="button">Buy Now</a>
                        <!--//Redirect To Checkout-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--//View Product Details-->
<!--footer-->
	<?php include("footer.php"); ?>
<!--/footer-->
</body>
</html>