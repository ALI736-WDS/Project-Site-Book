<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include '../database/db.php' ;

$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.blogs WHERE blogs.id=?") ;
$select->bindValue(1,$_GET['id']) ;
$select->execute() ;
$blogs=$select->fetchAll(PDO::FETCH_ASSOC) ;
//var_dump($blogs) ;	// namayeshe etelaat roye safhe sayt baraye Teste didane khodemun baraye 
	
if(isset($_POST['submit']))
{
//	$title=$_POST['username'] ;
	$title=$_POST['title'] ;
	$caption=$_POST['editor1'] ;
	$writer=$_POST['writer'] ;
	$readtime=$_POST['readtime'] ;
	$image=$_POST['image'] ;
	$tags=$_POST['tags'] ;
	$id=$_GET['id'] ;
//	$time_edit=jdate('H:i:s');
//	$date_edit=jdate('Y/m/d');
	
	$insert=$conn->prepare("UPDATE shafaye1_weblog_ketab_sara.blogs SET title=? , caption=? , writer=? , readtime=? , image=? , tags=? WHERE id=?") ;	#hamegi = ?  baraye amnite bishtar dar ravesh PDO conn
					   
//	$insert->bindValue(1,$username) ;
	$insert->bindValue(1,$title) ;
	$insert->bindValue(2,$caption) ;
	$insert->bindValue(3,$writer) ;
	$insert->bindValue(4,$readtime) ;
	$insert->bindValue(5,$image) ;
	$insert->bindValue(6,$tags) ;
//	$insert->bindValue(7,$time_edit) ;
//	$insert->bindValue(8,$date_edit) ;
	$insert->bindValue(7,$id) ;
	$insert->execute() ;  #hatman zade shavad vagarne Etelaat varede database nemishavad
	header("location:view-blogs.php") ;
}

include '../includes/menu admin.php';
?>
<!doctype html>
<html>
<head>  
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> پنل ادمین - صفحه مقاله‌ها </title>
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="container">
<div class="add-edit-blog">

	<form action="" method="POST" onSubmit="return add_edit_blog();">
		<?php foreach($blogs as $blog): ?>

	<fieldset>
		<legend class="form-legend"> ویرایش مقالات </legend>

	<div class="time">
		<p><?php $time=date('H:i:s'); echo $time;?></p>
		<p><?php $date=jdate('Y/m/d');  echo $date; ?></p>
		<p><?php $time2=date('d:M:Y'); echo $time2;?></p>
	</div><br>

		<input type="text" name="title" class="form-control" id="title" placeholder="موضوع مقاله" value="<?= $blog['title']; ?>">
		<div id="msg_title"> لطفا موضوع مقاله خود را وارد کنید </div>
		
		<script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script> <!--	textarea pishrafte -->
	<textarea name="editor1" id="editor1" placeholder="توضیحات"><?= $blog['caption']; ?></textarea>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
		<div id="msg_editor1"> لطفا توضیحات را وارد کنید </div>
		
		<select name="writer" class="form-control" id="writer">
			<option value="1"> <?= $blog['writer']; ?> </option>
		</select>
<!--		<div id="msg_writer"> لطفا نام نویسنده را وارد کنید </div>-->
		
		<input type="number" name="readtime" class="form-control" id="readtime" placeholder="زمان تقریبی مطالعه" value="<?= $blog['readtime']; ?>">
		<div id="msg_readtime"> لطفا زمان تقریبی مطالعه را وارد کنید </div>
		
		<input type="text" name="image" class="form-control" id="image" placeholder="لینک عکس" value="<?= $blog['image']; ?>">
		<div id="msg_image"> لطفا لینک عکس را وارد کنید </div>
		
		<input type="text" name="tags" class="form-control" id="tags" placeholder="تگ ها" value="<?= $blog['tags']; ?>">
		<div id="msg_tags"> لطفا تگ‌ها را وارد کنید </div>
		
		<input type="submit" name="submit" class="btn btn-success form-control" value="ویرایش">
	</fieldset>
		<?php endforeach; ?>
	</form>
	
<div class="upload-file">
	<form method="post" enctype="multipart/form-data">
		<label> آدرس فایل <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle mr-1 mb-1" viewBox="0 0 16 16">
  		<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>
		</label>
		<input type="file" name="file">	
		<input type="submit" name="btn-upload-file" value="آپلود فایل">
	</form>
</div><!--end upload-file-->

<?php
	if (isset($_POST["btn-upload-file"])) 
	{
echo "<div class=upload-inf-file>";		
		if (empty($_FILES["file"])) 
		{
			echo "<p class='p-upload-inf-address'>";
		}
		else
		{
			$file_name="".$_FILES["file"]["name"]; 
			$file_address="../image/image upload/".$_FILES["file"]["name"];
			$file_size=floor($_FILES["file"]["size"]/1024)." کیلوبایت";
			$file_type=$_FILES["file"]["type"];
			$file_tmp=$_FILES["file"]["tmp_name"];

			if (is_uploaded_file($file_tmp)) 
			{
				if(move_uploaded_file($file_tmp, $file_address))
				{
					echo "<p class='p-upload-inf'> فایل با موفقیت آپلود شد </p>";
					echo "<p> نام فایل : &nbsp&nbsp&nbsp".$file_name."</p>";
					echo "<p> سایز فایل : &nbsp&nbsp&nbsp".$file_size."</p>";
					echo "<p> نوع فایل : &nbsp&nbsp&nbsp".$file_type."</p>";
					echo "<p> آدرس فایل : &nbsp&nbsp&nbsp".$file_address."</p>";
					echo "<p class='p-upload-inf-address'> آدرس فایل را کپی کرده و در <a href='#link-img'>لینک عکس قرار</a> دهید </p>";
//					echo '<a href="'.$filename.'">ادرس فایل </a>';
				}
			}
			else
			{
				echo "<p class='p-no_upload-inf'> مشکل در آپلود فایل </p>";
			}
		}
	}
?>
</div><!--end upload-inf-file-->
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