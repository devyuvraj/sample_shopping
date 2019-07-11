<?php
session_start();
if(isset($_SESSION["email"]))
{
}
else
{
    header("location:customerlogin.php");
}

unset($_SESSION["email"]);
unset($_SESSION["name"]);

header("location:customerlogin.php");
?>