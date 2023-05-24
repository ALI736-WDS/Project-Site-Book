<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include "../database/db.php" ;

if(isset($_POST['submit']))
{
	$username=$_POST['username'] ;
	$image=$_POST['image'] ;
	$bio=$_POST['editor1'] ;
	$time=jdate('H:i:s') ;
	$date=jdate('Y/m/d') ;
	
	$insert=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.writers SET username=? , image=? , bio=? , time=? , date=?") ;
	
	$insert->bindValue(1,$username) ;
	$insert->bindValue(2,$image) ;
	$insert->bindValue(3,$bio) ;
	$insert->bindValue(4,$time) ;
	$insert->bindValue(5,$date) ;
	$insert->execute() ;
	header("location:view-writers.php") ;
}

include '../includes/menu admin.php';
?>
<!doctype html>
<html>
<head>  
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> پنل ادمین - صفحه نویسندگان </title>
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="container">
<div class="add-edit-blog">
	
	<form action="" method="post" onSubmit="return add_edit_writer();">
	<fieldset>
		<legend class="form-legend"> افزودن نویسنده جدید </legend>
		
		<div class="time">
			<p><?php $time=jdate('H:i:s'); echo $time;?></p>
			<p><?php $date=jdate('Y/m/d'); echo $date;?> </p>   <!-- code satre bala >> 45 --> 
			<p><?php $time2=date('d:M:Y'); echo $time2;?></p>
		</div><br>
		
		<input type="text" class="form-control" name="username" id="username" placeholder="نام نویسنده">
		<div id="msg_username"> لطفا نام نویسنده را وارد کنید </div>
		
		<script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script> <!--	textarea pishrafte -->
	<textarea name="editor1" id="editor1" placeholder="توضیحات"></textarea>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
		<div id="msg_editor1"> لطفا توضیحات را وارد کنید </div>
		
		<input type="text" name="image" class="form-control" id="image" placeholder="لینک عکس">
		<div id="msg_image"> لطفا لینک عکس را وارد کنید </div>
		
		<input type="submit" name="submit" class="btn btn-success form-control" value="افزودن نویسنده">
	</fieldset>
	</form>
	
</div><!--end add-edit-blog-->
</div><!--end container-->
</div><!--end col-->

<?php
include '../includes/footer.php' ;
?>
	
</body>
	
	
<script src="../js/main.js"></script>
	
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>