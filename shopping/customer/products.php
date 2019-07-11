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
    <style type="text/css">
    #img
    {
        height:240px;
        max-width: 100%;
    }
    </style>
</head>

<body style="background-color:#EDF7F5";>
<!--customer home page-->
<!--navbar top-->
	<?php include("navbar.php"); ?>
<!--/navbar end-->

<!--Display Products Gallery-->
<div class="container">
<h3 class="h3 text-center">Products </h3>
    <div class="row">
        <?php
        $search = "";
        if(isset($_POST["btnsearch"]))
        {
            $search = $_POST["search"];
        }
        $qry = "SELECT * FROM productinfo WHERE productname LIKE '%$search%'";
        $rs = $con->readrecord($qry);
        while($row = mysqli_fetch_array($rs))
        {
            $catid = $row["catid"];
            $catname = $row["catname"];
            $subcatname = $row["subcatname"];
            $productname = $row["productname"];
            $productcompany = $row["productcompany"];
            $actulprice = $row["actulprice"];
            $discountprice = $row["discountprice"];
            $shipcharge = $row["shipcharge"];
            $status = $row["status"];
            $productdescription = $row["productdescription"];
            $photo = $row["photo"];
            ?>
            <div class="col-lg-3 col-md-3 col-sm-1">
                <form action="" method="post" id="frm" name="frm">
                    <div class="card my-2">
                        <h6 class="card-title bg-info text-white p-2">
                            <?php echo $productcompany; ?>
                        </h6>
                        <div class="card-body">
                            <img id="img" src="<?php echo "../admin/$photo" ?>" class="img-fluid mb-2" alt="products" />
                            <h6><?php echo $productname; ?></h6>
                            <h6>&#8377; <del> <?php echo $actulprice; ?>/-</del> <span>(<?php echo $discountprice; ?>/-)%Off</span></h6>
                            <h6 class="badge badge-success">4.4 <i class="fa fa-star"></i></h6>
                            <span class="text-muted"><?php echo $status; ?></span>
                        </div>
                        <div class="btn-group d-flex justify-content-center mb-2">
                        <!--View Product Description-->
                            <a href="viewproduct.php?productname=<?php echo $productname; ?>&productcompany=<?php echo $productcompany; ?>&actulprice=<?php echo $actulprice; ?>&discountprice=<?php echo $discountprice; ?>&shipcharge=<?php echo $shipcharge; ?>&status=<?php echo $status; ?>&productdescription=<?php $productdescription; ?>&photo=<?php echo $photo; ?>&catid=<?php echo $catid; ?>" class="btn btn-info flex-fill" role="button">View More >></a>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--//Display Products Gallery-->
<!--footer-->
	<?php include("footer.php"); ?>
<!--/footer-->
</body>
</html>