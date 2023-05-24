<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include "../database/db.php" ;
if(isset($_GET["id"]))
{
	$delete=$conn->prepare("DELETE FROM shafaye1_weblog_ketab_sara.links WHERE links.id=?") ;
	$delete->bindValue(1,$_GET['id']) ;

		if($delete->execute())
		{
//			echo Delete is Carefully / حذف با موفقیتت انجام شد
			header("location:view-links.php") ;
			exit ;
		}
		else
		{
//			echo "This Delete is fialed / حذف ناموفق" ;
			header("location:view-links.php") ;
			exit ;
		}
}
else
{
//	echo "This Delete is fialed, no id / حذف ناموفق" ;
	header("location:view-links.php") ;
	exit ;
}
?>
