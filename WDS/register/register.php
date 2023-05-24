<?php
include '../includes/jdf.php' ;
include "../database/db.php" ;

if(isset($_POST['submit']))
{
	$username=$_POST['username'] ;
	$email=$_POST['email'] ;
	$password1=$_POST['password1'] ;
	$password2=$_POST['password2'] ;
	$time=jdate('H:i:s') ;
	$date=jdate('Y/m/d');

	$insert=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.users SET username=? , email=? , password1=? , password2=? , time=? , date=?") ;

	$insert->bindValue(1,$username) ;
	$insert->bindValue(2,$email) ;
	$insert->bindValue(3,$password1) ;
	$insert->bindValue(4,$password2) ;
	$insert->bindValue(5,$time) ;
	$insert->bindValue(6,$date) ;
	$insert->execute() ;	
	header('location:login.php') ;
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<title> وبلاگ </title>
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">
<div class="container">
	
	<div class="all-register-div col-lg-12 col-md-12 col-sm-12">
  <div class="register-div">
    <div class="logo">
	  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
	    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
	    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
	  </svg>
	 </div>
    <div class="title1"><div class="title"> ثبت نام </div></div>
    
<form action="" method="post" onSubmit="return do_register();">	
	<div class="fields">
      <div class="username">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z">
          </path>
        </svg>
        <input type="username" name="username" class="user-input" id="username" placeholder="Username">
      </div>
		<div id="msg_username"> لطفا نام کاربری خود را وارد کنید </div>
		
		<div class="email">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z">
          </path>
        </svg>
        <input type="email" name="email" class="email-input" id="email" placeholder="email">
      </div>
		<div id="msg_email"> لطفا ایمیل خود را وارد کنید </div>
		<div id="msg_email_motabar"> ایمیل شما معتبر نمی باشد </div>
      
		<div class="password1">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878">
          </path>
        </svg>
        <input type="password" name="password1" class="password1-input" id="password1" placeholder="Password">
      </div>
		<div id="msg_password1"> لطفا گذرواژه خود را وارد کنید </div>
		
		<div class="password2">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878">
          </path>
        </svg>
        <input type="password" name="password2" class="password2-input" id="password2" placeholder="Password">
      </div>
		<div id="msg_password2"> لطفا تکرار گذرواژه خود را وارد کنید </div>
		<div id="msg_password1_2"> گذرواژه‌ها باهم مطابقت ندارند </div>
		
		
		<input type="submit" name="submit" value="ثبت نام" class="btn submit">
    </div>
</form>
</div>
</div>
	
	<script src="../js/main.js"></script>
	
</body>
</html>