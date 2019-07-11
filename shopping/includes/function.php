<?php
function connectinfo()
{
	$con = mysqli_connect("localhost", "root", "", "raoun power pvt. ltd");
    return $con;
}
function executequery($qry)
{
	$status="";
	$rs=mysqli_query(connectinfo(), $qry);
if(!$rs)
{
	$status.="Eroor";
}
else
{
	$status.="success";
}
return $rs;
}
function readrecord($qry)
{
	$rs = mysqli_query(connectinfo(), $qry);
	return $rs;
}

function galleryinfo($qry,$pagename,$coltext,$colindex)
{
	$status="";
	$rs = readrecord($qry);
	$col = mysqli_num_fields($rs);
	while($row = mysqli_fetch_array($rs))
	{
		$status.="<div class='galleryinfo' ><center><br />";
		for($p=0; $p < $col; $p++)
		{
			$status.="<h3 class='clsh' >$row[$p]</h3>";
		}
		$status.="<a href='$pagename?id=$row[$colindex]' >$coltext</a><br />";
		$status.="</center></div>";
	}
	return $status;
}

function tableinfo($qry)
{
	$status="";
	$rs=readrecord($qry);
	if(mysqli_num_rows($rs)>0)
	{
	$status.="<table border='1' >";
	$col = mysqli_num_fields($rs);
	$status.="<tr>";
	for($p=0; $p < $col; $p++)
	{
		$status.="<th>".mysqli_field_name($rs, $p)."</th>";
	}
	$status.="</tr>";

	while($row=mysqli_fetch_array($rs))
	{
		$status.="<tr>";
		for($p=0; $p < $col; $p++)
		{
			$status.="<td>$row[$p]</td>";
		}
		$status.="</tr>";
	}
	$status.="</table>";
	}
	else
	{
		$status="Sorry Record not Found";
	}
	return $status;
}

function tableinfo_select($qry,$page,$url,$colname,$colindex)
{
	$status="";
	$rs=readrecord($qry);
	if(mysqli_num_rows($rs)>0)
	{
	$status.="<table border='1' >";
	$col=mysqli_num_fields($rs);
	$status.="<tr>";
	for($p=0;$p<$col;$p++)
	{
		$status.="<th>".mysqli_field_name($rs,$p)."</th>";
	}
	$status.="<th>$colname</th>";
	$status.="</tr>";
	while($row=mysqli_fetch_array($rs))
	{
		$status.="<tr>";
		for($p=0;$p<$col;$p++)
		{
			$status.="<td>$row[$p]</td>";
		}
		$status.="<td><a href='$page?$url=$row[$colindex]' >$colname</a></td>";
		$status.="</tr>";
	}
	$status.="</table>";
	}
	else
	{
		$status="Sorry Record not Found";
	}
	return $status;
}
?>