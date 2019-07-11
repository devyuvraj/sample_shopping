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
    $status = "";
    $path = "";
    /*update Product*/
    if(isset($_POST["sub"]))
    {
        if($_FILES["photo"]["error"]==0)
        {
            $path = "products/".$_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
        }
        extract($_POST);
        $qry = "UPDATE productinfo
        SET
            productname  = '$prdctname', productcompany = '$prdctcmpny', actulprice = '$prdctprice', discountprice = '$prdctdscnt', shipcharge = '$prdctshpchrg', status = '$prdctstatus', productdescription = '$prdctdscrptn', photo = '$path' WHERE catid = '$prdctid'
        ";
        $rs = $con->executequery($qry);
        if($rs == "success")
        {
            $status = "Product Update Successfully!";
        }
        else
        {
            $status = "Error To Update!";
        }
    }
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
    <h1 style="font-family: 'Work Sans', sans-serif;" class="display-6 text-primary text-center mt-3">Update Product</h1>
        <hr class="my-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
        <form class="mb-2" id="frm" name="frm" method="post" action="" enctype="multipart/form-data" >
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="prdctname">Product Id</label>
                    <input type="text" class="form-control" id="prdctid" name="prdctid" value="<?php echo $_GET["catid"]; ?>" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label for="catname">Category</label>
                    <input type="text" class="form-control" id="catname" name="catname" value="<?php echo $_GET["catname"]; ?>" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label for="subcat">Subcategory</label>
                    <input type="text" class="form-control" id="subcat" name="subcat" value="<?php echo $_GET["subcatname"]; ?>" readonly />
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
                    <label for="prdctname">Product Name</label>
                    <input type="text" class="form-control" id="prdctname" name="prdctname" value="<?php echo $_GET["productname"]; ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="prdctcmpny">Product Brand / Company</label>
                    <input type="text" class="form-control" id="prdctcmpny" name="prdctcmpny" value="<?php echo $_GET["productcompany"]; ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="prdctprice">Actual Price</label>
                    <input type="text" class="form-control" id="prdctprice" name="prdctprice" value="<?php echo $_GET["actulprice"]; ?>" required autocomplete="off">
                </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-4">
                    <label for="prdctdscnt">Discount Price</label>
                    <input type="text" class="form-control" id="prdctdscnt" name="prdctdscnt" value="<?php echo $_GET["discountprice"]; ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="prdctshpchrg">Shipping Charges</label>
                    <input type="text" class="form-control" id="prdctshpchrg" name="prdctshpchrg" value="<?php echo $_GET["shipcharge"]; ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="prdctstatus" name="prdctstatus">Status</label>
                    <select id="prdctstatus" name="prdctstatus" class="form-control">
                        <option selected>Choose..</option>
                        <option value="In-Stock">In-Stock</option>
                        <option value="Out-Of-Stock">Out-Of-Stock</option>
				    </select>
			    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="prdctdscrptn">Description</label>
                    <textarea class="form-control" id="prdctdscrptn" name="prdctdscrptn" cols="40" rows="5" value="<?php echo $_GET["productdescription"]; ?>" placeholder="Enter Product Description" required autocomplete="off" ></textarea>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-12">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo">Upload Product Image</label>
                </div>
			</div>
            <input type="submit" class="btn btn-outline-warning btn-md my-2 btn-block" id="sub" name="sub" value="Update" />
            <h4 class="text-success font-weight-bold text-center"><?php echo $status; ?></h4>
        </form>
    </div>
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