
<?php
//connectivity to db
function connectinfo()
{
    $con = mysqli_connect("localhost", "root", "", "shopping");
    return $con;
}

//insert, update, delete
function executequery($qry)
{
    $status = "";
    $rs = mysqli_query(connectinfo(), $qry);

    if(!$rs)
    {
        $status = "error";
    }
    else
    {
        $status = "success";
    }
    return $rs;
}

//readrecord from db
function readrecord($qry)
{
    $rs = mysqli_query(connectinfo(), $qry);
    return $rs;
}
?>