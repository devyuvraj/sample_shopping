<?php
class connectionclass
{
    private $con = null;
    //create connection
    public function __construct()
    {
        $this->con=mysqli_connect("localhost", "root", "");
        mysqli_select_db($this->con, "shopping");
    }

    //insert update delete
    public function executequery($qry)
    {
        $status = "success";
        $rs = mysqli_query($this->con, $qry);
        if(!$rs)
        {
            $status = "fail";
        }
        return $status;
    }

    //readrecord from database
    public function readrecord($qry)
    {
        $rs = mysqli_query($this->con, $qry);
        return $rs;
    }
}
$con = new connectionclass();
?>