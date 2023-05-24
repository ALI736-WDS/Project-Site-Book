<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include '../database/db.php' ;

$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.links WHERE links.id=?") ;
$select->bindValue(1,$_GET['id']) ;
$select->execute() ;
$links=$select->fetchAll(PDO::FETCH_ASSOC) ;
//var_dump($blogs) ;	// namayeshe etelaat roye safhe sayt baraye Teste didane khodemun baraye 
	
if(isset($_POST['submit']))
{
	$title=$_POST['title'] ;
	$src_download_link=$_POST['src_download_link'] ;
	$caption=$_POST['editor1'] ;
	$image=$_POST['image'] ;
	$id=$_GET['id'] ;
	
	$insert=$conn->prepare("UPDATE shafaye1_weblog_ketab_sara.links SET title=? , src_download_link=? , caption=? , image=? WHERE id=?") ;	#hamegi = ?  baraye amnite bishtar dar ravesh PDO conn

	$insert->bindValue(1,$title) ;
	$insert->bindValue(2,$src_download_link) ;
	$insert->bindValue(3,$caption) ;
	$insert->bindValue(4,$image) ;
	$insert->bindValue(5,$id) ;
	$insert->execute() ;  #hatman zade shavad vagarne Etelaat varede database nemishavad
	header("location:view-links.php") ;
}

include '../includes/menu admin.php';
?>
<!doctype html>
<html>
<head>  
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> پنل ادمین </title>
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="container">
<div class="add-edit-blog">

	<form action="" method="POST">
		<?php foreach($links as $link): ?>

	<fieldset>
		<legend class="form-legend"> ویرایش لینک‌ها </legend>

<!--
	<div class="time">
		<p><?php //$time=date('H:i:s'); echo $time;?></p>
		<p><?php //$date=jdate('Y/m/d');  echo $date; ?></p>
		<p><?php //$time2=date('d:M:Y'); echo $time2;?></p>
	</div><br>
-->

		<input type="text" placeholder="موضوع لینک" class="form-control" name="title" value="<?= $link['title']; ?>"><br>
		<input type="text" placeholder="آدرس لینک" class="form-control" name="src_download_link" value="<?= $link['src_download_link']; ?>"><br>
		<script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script> <!--	textarea pishrafte -->
	<textarea name="editor1" id="editor1"  placeholder="توضیحات لینک"><?= $link['caption']; ?></textarea><br>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
<!--
		<select name="writer" class="form-control">
			<option value="1"> <?//= $link['writer']; ?> </option>
		</select>
-->
<!--		<input type="number" name="readtime" class="form-control" value="<?//= $link['readtime']; ?>" placeholder="زمان تقریبی مطالعه">-->
		<input type="text" name="image" class="form-control" placeholder="آدرس عکس لینک" value="<?= $link['image']; ?>">
<!--		<input type="text" name="tags" class="form-control" placeholder="تگ ها" value="<?//= $link['tags']; ?>">-->
		<input type="submit" name="submit" class="btn btn-success form-control" value="ویرایش">
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
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>