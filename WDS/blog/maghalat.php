<?php 
session_start();
$id=$_GET['id'];
include '../database/db.php';

$select_show_text_blog=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.blogs WHERE id=?");
$select_show_text_blog->bindValue(1,$id);
$select_show_text_blog->execute();
$show_text_blogs=$select_show_text_blog->fetchAll(PDO::FETCH_ASSOC);
foreach($show_text_blogs as $show_text_blogs_other); // halghe foreach baraye tags(khate 54) va id writer va bio writer(khate 60)
						  // ba yek haghe foreach yani ba estefadeh az moteghayer az jadvale blogs va ba taghire moteghayer ($b_tag) jadval ha be ham vasl shodan va etelaat peyda shod


// sabte (view)
$select_record_view=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.views SET post_seen_id=?");
$select_record_view->bindValue(1,$id);
$select_record_view->execute();
//** (end code sabte view)

// namayeshe tedad view dar safhe blog
foreach($show_text_blogs as $show_text_blog):
$select_show_number_view=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.views WHERE post_seen_id=?");
$select_show_number_view->bindValue(1,$show_text_blog['id']);
$select_show_number_view->execute();
$show_number_views=$select_show_number_view->fetchColumn();  // $numro : tedad radif ha views
//** (end code namayeshe tedad view)


// sabte (comment)
if(isset($_POST['submit']))
{
	$user_comment_id=$_SESSION['username'];  // ($_session) bekhatere inke be safahate dige yani safhe sabtenam dastresi dashte bashe va agar karbar sabtenam nakarde bun , natune vared beshe
	$text=$_POST['editor1'];
	
	$select_record_comment=$conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.comments SET post_comment_id=? , user_comment_id=? , text=?");	
	$select_record_comment->bindValue(1,$id);
	$select_record_comment->bindValue(2,$user_comment_id);
	$select_record_comment->bindValue(3,$text);
	$select_record_comment->execute();
} //** (end code sabte comment)


// namayeshe comment va username dar safhe site
$select_show_user_comment=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.comments WHERE post_comment_id=?");
$select_show_user_comment->bindValue(1,$id);
$select_show_user_comment->execute();
$show_user_comments=$select_show_user_comment->fetchAll(PDO::FETCH_ASSOC);
//** (end code namayeshe comment)


// namayeshe tedad comment dar safhe site
$select_show_number_comment=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.comments WHERE post_comment_id=?");
$select_show_number_comment->bindValue(1,$id);
$select_show_number_comment->execute();
$show_number_comments=$select_show_number_comment->fetchColumn();  // fetchColumn() : baraye namayeshe tedade hameye cament haye zire in post
//echo $numro_comments;
//** (end code namayeshe tedad comment)


// namayeshe tags dar paein har blog(safhe site)
$show_tags=explode(' , ' , $show_text_blogs_other['tags']);  // (','): chun tagha ba , az ham joda shodan 
								   // ($b_tag['tags']): khate 11 ba halghe foreach, tags ra gereftim va inja vared mishe va da khate 112 namayesh dade mishan ; inja andise >>> ['tags'] ro darim va dar khate 112 dige bedun andis amal mikonim
//** (end code namayeshe tags)

// peyda kardane id va bio writer ba estefade az halghe va jadvale blogs
$show_user_writer=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.writers WHERE id=?");
$show_user_writer->bindValue(1,$show_text_blogs_other['writer']); // entekhabe writer az writere(id) jadvale blogs
$show_user_writer->execute();
$show_user_writers=$show_user_writer->fetchAll(PDO::FETCH_ASSOC);
foreach($show_user_writers as $show_user_writers_other);
//** (end code peyda kardane id va bio)

include '../includes/menu site.php';
?><?php endforeach; ?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> مقالات </title>
	
	<link rel="shortcut icon" href="../Image/Jeld Ketab.jpg">
	
	<link rel="stylesheet" href="../CSS/fonts.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">
	
<div class="style-main col-lg-12 col-md-12 col-sm-12">
<div class="container">

	<?php foreach($show_text_blogs as $show_text_blog): ?>
	<div class="blog">
		<h1><?= $show_text_blog['title'] ?></h1>
		
		<div class="date-time">
<!--
			<span> ساعت انتشار: <?//= $blog['time'] ?></span>
			<span> تاریخ انتشار: <?//= $blog['date'] ?></span> <br>
			<span> ساعت ویرایش: <?//= $blog['time_edit'] ?></span>
			<span> تاریخ ویرایش: <?//= $blog['date_edit'] ?></span>
-->
		</div><hr/>
		
		
		<div class="div-SL-inf-blog col-lg-11 col-md-11 col-sm-11 col-xs-10">
		<div class="font-weight-bold">
			<svg class="svg-seen mb-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
			  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
			  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
			</svg><span class="mr-1"><?= $show_number_views; ?></span>

			<svg class="svg-chat mr-2 mb-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
			  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
			  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
			</svg><span class="mr-1"><?= $show_number_comments ?></span>
		</div>
		
		<div class="">
			<svg class="svg-person mb-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
			<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
			</svg><span class="mr-1"><strong>دکتر مجتبی خوانساری</strong><?//= $writer['username']; ?></span>
		</div>
		
		<div class="div-date font-weight-bold">
			<svg class="svg-date mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
  			<path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
  			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
			</svg><span class="mr-5"><?= $show_text_blog['date']; ?></span><span class="mr-1"><?= $show_text_blog['time']; ?></span>
		</div>
	</div>
	
		<img class="img-fluid" src="<?= $show_text_blog['image'] ?>" width="100%" height="600px" alt="کیک">
		<span>
			<?= $show_text_blog['caption'] ?>
		</span>
	<?php endforeach; ?>
			
			<div class="tags">
				<p class="p-tag"> برچسب‌ها </p>
				<div class="a-tag">
				<?php foreach($show_tags as $show_tag): ?>
				<a href=""><?= $show_tag ?></a>
				<?php endforeach; ?>
				</div>
			</div>
	</div>	
</div>
</div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
			<?php foreach($show_user_writers as $show_user_writer): ?>
			<div class="writer-info">
			<?php if("role=2"){ ?>
				<img src="<?= $show_user_writer['image'] ?>" width=70px; alt="">
				<a href=""><?= $show_user_writer['username'] ?></a>
				<span><?= $show_user_writer['bio'] ?></span>
			<?php } ?>
			</div>		
			<?php endforeach; ?>
		</div>

	<div class="">
		<div class="coment2">
			<h5> دیدگاهتان را بنویسید </h5>
			<script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
		<form action="" method="post">
			<textarea name="editor1" id="editor1"></textarea>
				<script>
					CKEDITOR.replace( 'editor1' );
				</script>
			<input type="submit" name=submit class="btn btn-success btnsubmit" value="ثبت دیدگاه">
		</form>
			<?php foreach($show_user_comments as $show_user_comment){ ?>
			<div class="user-coment"> 
				<?= $show_user_comment['user_comment_id'] ?><br>
				<?= $show_user_comment['text'] ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
	
<?php
include '../includes/footer.php' ;
?>
		
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>