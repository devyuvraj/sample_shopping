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
    <title>Shopping::Customer</title>
    <?php include("../includes/headlink.php"); ?>
</head>

<body style="background-color:#EDF7F5";>
<!--customer home page-->
<!--navbar top-->
	<?php include("navbar.php"); ?>
<!--/navbar end-->

<!--footer-->
	<?php include("footer.php"); ?>
<!--/footer-->
</body>

</html>