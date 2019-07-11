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
    /*Add Product*/
    if(isset($_POST["sub"]))
    {
        if($_FILES["photo"]["error"]==0)
        {
            $path = "products/".$_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
        }
        extract($_POST);
        $qry = "INSERT INTO productinfo
        (
            catname, subcatname, productname, productcompany, actulprice, discountprice, shipcharge, status, productdescription, photo
        )
        VALUES
        (
            '$catname', '$subcatname', '$prdctname', '$prdctcmpny', '$prdctprice', '$prdctdscnt', '$prdctshpchrg', '$prdctstatus', '$prdctdscrptn', '$path'
        )";
        $rs = $con-> executequery($qry);
        if($rs == "success")
        {
            $status = "Product Add Successfully!";
        }
        else
        {
            $status = "Error To Add!";
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
    <h1 style="font-family: 'Work Sans', sans-serif;" class="display-6 text-primary text-center mt-3">Add Product</h1>
        <hr class="my-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
        <form class="mb-2" id="frm" name="frm" method="post" action="" enctype="multipart/form-data" >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="catname" name="catname">Category</label>
                    <select id="catname" name="catname" class="form-control">
                        <option selected>Choose Category..</option>
                        <option>Electronic</option>
                        <option>TVs & Appliances</option>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Baby & Kids</option>
                        <option>Home & Furniture</option>
				    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="subcatname" name="subcatname">Sub Category</label>
                    <select id="subcatname" name="subcatname" class="form-control">
                        <option selected>Choose Category..</option>
                        <option value="Mobiles">Mobiles</option>
                        <option value="Tv">Tv</option>
				    </select>
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
                    <label for="prdctname">Product</label>
                    <input type="text" class="form-control" id="prdctname" name="prdctname" placeholder="Enter Product Name" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="prdctcmpny">Product Brand / Company</label>
                    <input type="text" class="form-control" id="prdctcmpny" name="prdctcmpny" placeholder="Enter Product Company" required autocomplete="off">
                </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prdctprice">Actual Price</label>
                    <input type="text" class="form-control" id="prdctprice" name="prdctprice" placeholder="Enter Product Price Before Discount" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="prdctdscnt">Discount Price</label>
                    <input type="text" class="form-control" id="prdctdscnt" name="prdctdscnt" placeholder="Enter Product Price After Discount" required autocomplete="off">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prdctshpchrg">Shipping Charges</label>
                    <input type="text" class="form-control" id="prdctshpchrg" name="prdctshpchrg" placeholder="Enter Shipping Charges" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="prdctstatus" name="prdctstatus">Status</label>
                    <select id="prdctstatus" name="prdctstatus" class="form-control">
                        <option selected>Choose..</option>
                        <option>In-Stock</option>
                        <option>Out-Of-Stock</option>
				    </select>
			    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="prdctdscrptn">Description</label>
                    <textarea class="form-control" id="prdctdscrptn" name="prdctdscrptn" cols="15" rows="10" placeholder="Enter Product Description" required autocomplete="off" ></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo">Upload Product Image</label>
                </div>
			</div>
            <input type="submit" class="btn btn-outline-success btn-md my-2 btn-block" id="sub" name="sub" value="Submit" />
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