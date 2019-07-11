<?php
session_start();
if(isset($_SESSION["user"]))
{
}
else
{
    header("location:adminlogin.php");
}

unset($_SESSION["user"]);

header("location:adminlogin.php");
?>