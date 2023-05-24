<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include '../database/db.php' ;

if(isset($_POST['submit']))
{
	$title=$_POST['title'] ;
	$src_download_link=$_POST['src_download_link'] ;
	$caption=$_POST['editor1'] ;
	$image=$_POST['image'] ;

	$insert=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.links SET title=? , src_download_link=? , caption=? , image=?");	#hamegi = ?  baraye amnite bishtar dar ravesh PDO conn
					
	$insert->bindValue(1,$title) ;
	$insert->bindValue(2,$src_download_link) ;
	$insert->bindValue(3,$caption) ;
	$insert->bindValue(4,$image) ;
	$insert->execute() ;  //hatman zade shavad vagarne Etelaat varede database nemishavad
	header("location:view-links.php") ;
}

include '../includes/menu admin.php';
?>
<!doctype html>
<html>
<head>  
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="content="0;> 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> پنل ادمین - صفحه لینک‌ها </title> 
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="container">
<div class="add-edit-blog">
	
	<form action="" method="post">
	<fieldset>
		<legend class="form-legend"> افزودن لینک جدید </legend>
		
		<input type="text" placeholder="عنوان لینک" class="form-control" name="title"><br>
		<input type="text" placeholder="آدرس لینک" class="form-control" name="src_download_link"><br>
		
		<script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script> <!--	textarea pishrafte -->
	<textarea name="editor1" id="editor1"  placeholder="توضیحات لینک"></textarea><br>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>

		<input type="text" name="image" placeholder="آدرس عکس لینک " class="form-control">
		<input type="submit" name="submit" class="btn btn-success form-control" value="ثبت">
	</fieldset>
	</form>
	
</div><!--end add-edit-blog-->
</div><!--end container-->
</div><!--end col-->

<?php
include '../includes/footer.php' ;
?>
	
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>