<?php
session_start();

$id=$_GET['id'];
include '../database/db.php';

$select_text_link=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.links WHERE id=?");
$select_text_link->bindValue(1,$id);
$select_text_link->execute();
$show_text_links=$select_text_link->fetchAll(PDO::FETCH_ASSOC);
//** (end code khandane etelaat az jadvale links)

// sabte (view)
$select_record_view=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.views SET post_seen_id=?");
$select_record_view->bindValue(1,$id);
$select_record_view->execute();
//** (end code sabte view)

// namayeshe tedad view dar safhe blog
foreach($show_text_links as $show_text_link):
$select_show_number_view=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.views WHERE post_seen_id=?");
$select_show_number_view->bindValue(1,$show_text_link['id']);
$select_show_number_view->execute();
$show_number_views=$select_show_number_view->fetchColumn();  // $numro : tedad radif ha views
//** (end code namayeshe tedad view)
 endforeach;

/////////////////////////////////////////
/////////////////////////////////////////
include '../includes/menu site.php' ;
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> لینک‌ها </title>
	
	<link rel="shortcut icon" href="../Image/Jeld Ketab.jpg">
	
	<link rel="stylesheet" href="../CSS/fonts.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head>
<body dir="rtl">
	
<div class="style-main pt-5 pb-1 col-lg-12 col-md-12 col-sm-12">
<div class="container">
	
<?php //foreach($show_text_links as $show_text_link): ?>
<div class="div-SL-link-download"> <!-- SL: Safhe Link shode -->
<div class="div-SL-a-link-download"> 

	<img class="col-lg-12 col-md-12 col-sm-12 img-fluid" src="<?= $show_text_link['image'] ?>" width="100%" height="600px" alt="عکس کتاب مورد نظر موجود نمی باشد">

	<div class="div-SL-caption-link-download"><?= $show_text_link['caption'] ?></div>

	<p class="div-SL-a-p-link-download"><a href="<?= $show_text_link['src_download_link'] ?>"><?= $show_text_link['title'] ?></a></p>

	<div class="div-svg-see-link">
		<svg class="svg-see-link mb-1 mr-4" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
		  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
		  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
		</svg><span><?= $show_number_views; ?></span>
	</div>
	
<?php //endforeach; ?>
</div><!--end div-SL-a-link-download-->
</div><!--end div-SL-link-download-->
</div><!--end container-->
</div><!--end style-main-->

<?php
include '../includes/footer.php' ;
?>
	
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>