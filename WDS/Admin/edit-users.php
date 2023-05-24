<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include "../database/db.php" ;

$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.users WHERE users.id=?") ;
$select->bindValue(1,$_GET['id']) ;
$select->execute() ;
$users=$select->fetchAll(PDO::FETCH_ASSOC) ;
//var_dump(email) ;	// namayeshe etelaat roye safhe sayt baraye Teste didane khodemun baraye 
	
if(isset($_POST['submit']))
{
	$username=$_POST['username'] ;
	$email=$_POST['email'] ;
	$password1=$_POST['password1'] ;
	$password2=$_POST['password2'] ;
//	$$roll=$_POST['$roll'] ;
	$id=$_GET['id'] ;
	
	$insert=$conn->prepare("UPDATE shafaye1_weblog_ketab_sara.users SET username=?, email=?, password1=?, password2=? WHERE id=?") ;
	
	$insert->bindValue(1,$username) ;
	$insert->bindValue(2,$email) ;
	$insert->bindValue(3,$password1) ;
	$insert->bindValue(4,$password2) ;
	$insert->bindValue(5,$id) ;
	$insert->execute() ;  #hatman zade shavad vagarne Etelaat varede database nemishavad
	header("location:view-users.php") ;
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

	<form action="" method="post" onSubmit="return do_register();">
		<?php foreach($users as $user): ?>

	<fieldset>
	<legend> ویرایش کاربران </legend>

	<div class="time">
		<p><?php $time=date('H:i:s'); echo $time;?></p>
		<p><?php $date=jdate('Y/m/d'); echo $date;?></p>
		<p><?php $time2=date('d:M:Y'); echo $time2;?></p>
	</div><br>

		<input type="text" class="form-control" name="username" id="username" placeholder="نام کاربر" value="<?= $user['username']; ?>">
		<div id="msg_username"> لطفا نام کاربری خود را وارد کنید </div>
		
		<input type="text" name="email" class="form-control" id="email" placeholder="ایمیل کاربر" value="<?= $user['email']; ?>">
		<div id="msg_email"> لطفا ایمیل خود را وارد کنید </div>
		<div id="msg_email_motabar"> ایمیل شما معتبر نمی باشد </div>
		
		<input type="text" name="password1" class="form-control" id="password1" placeholder="گذرواژه کاربر" value="<?= $user['password1']; ?>">
		<div id="msg_password1"> لطفا گذرواژه خود را وارد کنید </div>
		
		<input type="text" name="password2" class="form-control" id="password2" placeholder="تکرار گذرواژه کاربر" value="<?= $user['password2']; ?>">
		<div id="msg_password2"> لطفا تکرار گذرواژه خود را وارد کنید </div>
		<div id="msg_password1_2"> گذرواژه‌ها باهم مطابقت ندارند </div>
		
		
		<input type="submit" name="submit" class="btn btn-success form-control" value="ویرایش نویسنده">
	</fieldset>
		<?php endforeach; ?>
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