<?php
session_start();
include("../includes/config.php");
if(isset($_SESSION["cardinfo"]))
{
}
else
{
    $card = array();
    $_SESSION["cardinfo"]=$card;
}

$card = $_SESSION["cardinfo"];
$count = count($card);
$catid = $_GET["catid"];
$qty = $_GET["qty"];
$totlamt = $_GET["totlamt"];
$qry = "SELECT * FROM productinfo WHERE catid = '$catid'";
$rs = $con->readrecord($qry);
$row = mysqli_fetch_array($rs);
$card[$count]["productname"]=$row["productname"];
$card[$count]["actulprice"]=$row["actulprice"];
$card[$count]["discountprice"]=$row["discountprice"];
$card[$count]["shipcharge"]=$row["shipcharge"];
$card[$count]["totlamt"]=$totlamt;
$_SESSION["cardinfo"]=$card;
$_SESSION["count"]=$count;
header("location:products.php");
?>