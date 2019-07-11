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
?>
<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Shoping Portal::Admin</title>
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
      <div class="container-fluid">
        <h1 class="mt-2 font-weight-bold text-primary display-6">Sub Category Managment</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 table-responsive shadow">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Category Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //get category from db
                        $status = "";
                        extract($_POST);
                        $qry = "SELECT * FROM subcategoryinfo";
                        $rs = $con->readrecord($qry);
                        while($row = mysqli_fetch_array($rs))
                        {
                            $id = $row["catid"];
                            $catname = $row["catname"];
                            $subcatname = $row["subcatname"];
                            $catdescription = $row["catdescription"];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $catname; ?></td>
                            <td><?php echo $subcatname; ?></td>
                            <td><?php echo $catdescription; ?></td>
                            <td><a title="Add" href="subcategory.php"><i class="fas fa-plus"></i></a></td>
                            <td><a title="Edit" href="updtsubcategory.php?catid=<?php echo $id; ?>&catname=<?php echo $catname; ?>&subcatname=<?php echo $subcatname; ?>&catdescription=<?php echo $catdescription; ?>"><i class="far fa-edit"></i></a></td>
                            <td><a title="Delete" href="deletesubcategory.php?catid=<?php echo $id; ?>&catname=<?php echo $catname; ?>&subcatname=<?php echo $subcatname; ?>&catdescription=<?php echo $catdescription; ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
<!--/Menu Toggle Script -->
<!--footer-->
    <?php include("footer.php") ?>
<!--//footer-->
</body>
</html>