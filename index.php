<?php
session_start();
// gereftan maghalat az database blogs va namayesh dar site
include 'WDS/database/db.php' ;


// ORDER BY id : bar asase identekhab kon
// ASC: az aval be akhar namayesh bede  DESC: az akahr be aval namayesh bede
// LIMIT 3: 3 ta ro neshun bede
$select_show_text_blog=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.blogs ORDER BY id") ; //ORDER BY id DESC LIMIT 3
$select_show_text_blog->execute() ;
$show_text_blogs=$select_show_text_blog->fetchAll(PDO::FETCH_ASSOC) ;
//** (end code khandane etelaat az jadvale blogs)

//////////////////////////////////////////
//////////////////////////////////////////

$select_text_link=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.links ORDER BY id") ; //ORDER BY id DESC LIMIT 3
$select_text_link->execute() ;
$show_text_links=$select_text_link->fetchAll(PDO::FETCH_ASSOC) ;
//** (end code khandane etelaat az jadvale links)
//////////////////////////////////////////
//////////////////////////////////////////

if(isset($_POST['search']))
{
	$title=$_POST['title'];
	header('location:WDS/search in site/search.php?q='.$title); // q: query=chizi ke ersal mishe
}

//////////////////////////////////////////
//////////////////////////////////////////
include 'WDS/includes/menu main site.php' ;
?>
<!doctype html>
<html lang="fa" dir="rtl">
    
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=800px, initial-scale=1.0">
	<meta name="keywords" content="دانلود کتاب , کتاب , کتابسرا , مجتبی خوانساری و کتاب مجتبی خوانساری و شفای الهی و کتاب مجتبی خوانساری شفای الهی و کتاب مجتبی خوانساری بنام شفای الهی و شفا و الهی و روح القدس در اسلام و پیامبر اسلام و تسلط شیطان بر حضرت ایوب علیه السلام! و درگيرى حضرت موسى (ع) با ساحران به کجا رسید؟ و فواید خواندن سوره ناس و فلق(مُعَوِّذَتَیْن) و مسیح و شفای مرد دست خشکیده و روایات چشم زخم از پیامبر و "/>
		<meta name="description" content="دانلود کتاب مجتبی خوانساری بنام شفای الهی" />
		<meta name="author" content="مجتبی خوانساری" />
	<meta name="viewport" content="width=800px, initial-scale=1.0">

	
	<title> دانلود کتاب مجتبی خوانساری - شفای الهی </title>
	
		<link rel="shortcut icon" href="./WDS/Image/Jeld Ketab.jpg">
	
		<link rel="stylesheet" href="./WDS/CSS/fonts.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="WDS/CSS/bootstrap.css" >
		<link type="text/css" rel="stylesheet" href="WDS/CSS/style.css" />
		
</head>

<body dir="rtl">
    
<div class="d-none d-lg-block search-position">
<div class="search">
	<form action="" method="post">
		<input type="text" name="title" placeholder="دنبال چی میگردی؟" class="form-control input">
		<input type="submit" name="search" value="جستجو" class="btn btn-success sub">
	</form>
</div>
</div>
<div class="d-block d-lg-none search-position col-lg-12">
<div class="mobile-search">
	<form action="" method="post">
		<input type="text" name="title" placeholder="دنبال چی میگردی؟" class="form-control mobile">
		<input type="submit" name="search" value="جستجو" class="btn btn-success sub">
	</form>
</div>
</div>

<main class="col-lg-12">
<div class="container">
	
	    <div class="clock"></div>
	<div class="header-baner col-lg-12">
		<h1>جلد کتاب و توضیحات مختصر + لینک دانلود و سفارش کتاب + مطالب مرتبط</h1>
	</div>
	
		<div class="img-jeld-ketab">
		<img class="col-lg-12 col-md-12 col-sm-12" src="WDS/Image/Jeld Ketab.jpg" alt="عکس موجود نمیباشد" />
		</div>

	<div class="etelaat_ketab col-lg-12">
		<div>
			<ul>	
				<li> www.ayatpub.ir </li>
				<li> بیماری های ناشی از شیطان جنی، چشم زخم ، جادو و علاج قطعی آن </li>
				<li>______________________________________</li>
				<li> نویسنده: دکتر مجتبی خوانساری </li>
				<li> ناشر: انتشارات آیات </li>
				<li> صفحه آرایی: انتشارات آیات </li>
				<li> نوبت و سال چاپ: اول - 1399 </li>
				<li> شمارگان: 1000 جلد </li>
				<li> شابک : 5-47-6474-964-978 </li>
				<li> قیمت: 15000 تومان </li>
				<li>_____________________________________</li>
				<li> اهواز - کمپلو - خیابان انقلاب بین <br/>ارفع و ولیعصر پاساژ عبدالخانی </li>
				<li> 09355465525&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;06133792158 </li>
			</ul>
		</div>
		
		<div class="div-img-and-address">
			<img src="WDS/Image/Jeld Ketab 2.jpg" />
				<div>
					<p> آقای هادی قطبی زاده </p>
					<p> انتشارات آیات </p>
					<p> اهواز </p>
					<p> 09355465525 </p>	
				</div>
		</div>

		<div class="div-img-and-address768">
			<img src="WDS/Image/Jeld Ketab 2.jpg" />
				<div>
					<p> آقای هادی قطبی زاده </p>
					<p> انتشارات آیات </p>
					<p> اهواز </p>
					<p> 09355465525 </p>	
				</div>
		</div>
	</div>
		
<div class="div-link-download">
	<div class="div-a-link-download">	
		<?php
		foreach($show_text_links as $show_text_link): 
		$select_show_number_view=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.views WHERE post_seen_id=?");
		$select_show_number_view->bindValue(1,$show_text_link['id']);
		$select_show_number_view->execute();
		$show_number_views=$select_show_number_view->fetchColumn();  // $numro : tedad radif ha views
		?>

		
		<p><a href="WDS/blog/links.php?id=<?= $show_text_link['id']?>"  class="pl-5 link-download-p-a-pl-xl"target="_blank">
			<svg class="svg-seen mb-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"            class="bi bi-eye" viewBox="0 0 16 16">
			  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
			  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
			</svg>
			<span class="pl-5 pl-md-5 pl-sm-3 span-view-pl-xl"><?= $show_number_views; ?></span><?php $content= $show_text_link['title']; echo limit_words($content,100) ; ?></a></p>
		<?php endforeach; ?>
	</div>
</div>
		
		<!--
		<p><a href="https://idpay.ir/hadi-ghotbi-zadeh/shop/273833" target="_blank" > لینک سفارش کتاب بصورت پست </a></p>	
		<p><a href="http://shafayehelahi2.ir//WDS/download/ketabeh darmaneh bimariha jesmi va ruhi ravani va gheire.pdf.zip" target="_blank" > لینک دانلود PDF کتاب بصورت رایگان</a></p>	
-->
	<!--<p><a href="https://idpay.ir/mojtaba-khansari/file/163304" target="_blank" > لینک دانلود فایل  PDF کتاب </a></p>-->
<!--	<p><a href="https://idpay.ir/mojtaba-khansari/file/163301" target="_blank" > لینک دانلود فایل PDF دستورالعمل ضمیمه</a></p>-->
		
<!--//////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////-->			
	<div class="all_boxes col-lg-12">
		<h1> مطالب مرتبط با کتاب </h1>
		
<?php 
// gereftan maghalat az database blogs va namayesh dar site
	function limit_words($string , $word_limit)
	{
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
		foreach($show_text_blogs as $show_text_blog):
	$select_show_number_comment=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.comments WHERE post_comment_id=?");
	$select_show_number_comment->bindValue(1,$show_text_blog['id']);
	$select_show_number_comment->execute();
	$show_number_comments=$select_show_number_comment->fetchColumn();  // $numro : tedad radif haye comments

	$select_show_number_view=$conn->prepare("SELECT COUNT(*) FROM shafaye1_weblog_ketab_sara.views WHERE post_seen_id=?");
	$select_show_number_view->bindValue(1,$show_text_blog['id']);
	$select_show_number_view->execute();
	$show_number_views=$select_show_number_view->fetchColumn();  // $numro : tedad radif ha views
//** (end code peyda kardane id va bio)
?>
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-1">
	<div class="boxes">
		<img class="img-fluid" src="<?= $show_text_blog['image'] ?>" alt="عکس موجود نمی باشد">
		<p><?=$show_text_blog['title'] ?></p>

		<span> 
			<?php $content= $show_text_blog['caption']; echo limit_words($content,20).'...' ; ?>
		</span>
		
	<div class="div-inf-blog col-lg-11 col-md-11 col-sm-11 col-xs-10">
		<div class="div-view-comment font-weight-bold">
			<svg class="svg-seen" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"            class="bi bi-eye" viewBox="0 0 16 16">
			  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
			  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
			</svg><span class="span-as-svg-margin-top"><?= $show_number_views; ?></span>

			<svg class="svg-chat mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
			  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
			  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
			</svg><span class="span-as-svg-margin-top"><?= $show_number_comments ?></span>
		</div>
		
		<div class="d-flex mt-2">
			<svg class="svg-person" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
			<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
			</svg><span class="span-as-svg-margin-top"><strong>دکتر مجتبی خوانساری</strong><?//= $writer['username']; ?></span>
		</div>
		
		<div class="div-date d-flex mt-3 font-weight-bold">
			<svg class="svg-date" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
  			<path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
  			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
			</svg><span><?= $show_text_blog['time']; ?></span><span class="mr-4"><?= $show_text_blog['date']; ?></span>
		</div>
		
		<div class="Edame_Matlab"><a href="WDS/blog/maghalat.php?id=<?= $show_text_blog['id']?>" target="_blank"> ادامه مطلب </a></div>
	</div>
</div>
</div>
<?php endforeach; ?>
</div><!-- (end code gereftan .all_boxes) -->
</div>	
</main>			

<?php
include 'WDS/includes/footer.php' ;
?>
    
</body>
		
<script src="WDS/js/main.js"></script>
	
	
<!-- script ha marbut be menu site hast	-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>