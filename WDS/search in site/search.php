<?php
session_start() ;
include '../database/db.php' ;

$q=$_GET['q'];
// ORDER BY id : bar asase id entekhab kon
// ASC: az aval be akhar namayesh bede  DESC: az akahr be aval namayesh bede
// LIMIT 3: 3 ta ro neshun bede
$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.blogs WHERE title LIKE '%$q%'") ;
$select->execute() ;
$blogs=$select->fetchAll(PDO::FETCH_ASSOC) ;
//** (end code gereftan maghalat)



if(isset($_POST['search']))
{
	$title=$_POST['title'];
	header('location:search.php?q='.$title); // q: query=chizi ke ersal mishe
}

include '../includes/menu site.php' ;
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> وبلاگ </title>
	<link rel="stylesheet" href="../CSS/fonts.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">	

<div class="container">
	
<div class="d-none d-lg-block div-search-position col-lg-12">
<div class="search">
	<form action="" method="post">
		<input type="text" name="title" placeholder="دنبال چی میگردی؟" class="form-control input" value="<?= $q ?>">
		<input type="submit" name="search" value="جستجو" class="btn btn-success sub">
	</form>
</div>
</div>
<div class="d-block d-lg-none">
<div class="mobile-search">
	<form action="" method="post">
		<input type="text" name="title" placeholder="دنبال چی میگردی؟" class="form-control mobile" value="<?= $q ?>">
		<input type="submit" name="search" value="جستجو" class="btn btn-success sub">
	</form>
</div>
</div>
	
<div class="container">
<div class="row">
	<h4 id="title"> جستجوی انجام شده: </h4>

<?php 
// gereftan maghalat az database blogs va namayesh dar site
	function limit_words($string , $word_limit)
	{
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
		foreach($blogs as $blog):
	$comment=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.comments WHERE post_comment_id=?");
	$comment->bindValue(1,$blog['id']);
	$comment->execute();
	$numro_comments=$comment->fetchColumn();  // $numro : tedad radif haye comments

	$view=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.views WHERE post_seen_id=?");
	$view->bindValue(1,$blog['id']);
	$view->execute();
	$numro_views=$view->fetchColumn();  // $numro : tedad radif ha views
//** (end code peyda kardane id va bio)
?>
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-1">
	<div class="boxes">
		<img class="img-fluid" src="<?= $blog['image'] ?>" alt="عکس موجود نمی باشد">
		<p><?=$blog['title'] ?></p>

		<span> 
			<?php $content= $blog['caption']; echo limit_words($content,20).'...' ; ?>
		</span>
		
	<div class="co-view1 col-lg-11 col-md-11 col-sm-11 col-xs-10">
		<div class="co-view">
			<svg class="svg_see_index" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"            class="bi bi-eye" viewBox="0 0 16 16">
			  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
			  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
			</svg><span><?= $numro_views; ?></span>

			<svg class="svg_chat" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
			  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
			  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
			</svg><span><?= $numro_comments ?></span>
		</div>
		<div class="div_svg_person">
			<svg class="svg_person" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
			<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
			</svg><span> دکتر مجتبی خوانساری<?//= $writer['username']; ?></span>
		</div>
		
		<div class="date"><span><?= $blog['date']; ?></span></div>
		
		<div class="Edame_Matlab"><a href="../blog/maghalat.php?id=<?= $blog['id']?>" target="_blank"> ادامه مطلب </a></div>
		
	</div>
</div>
</div>
<?php endforeach; ?>
<!-- (end code gereftan maghalat) -->
</div>
</div>

<?php
include '../includes/footer.php' ;
?>
		
</body>
<!-- script ha marbut be menu site hast	-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>