<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include '../database/db.php' ;


$number=1 ;
$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.blogs ORDER BY id") ;
$select->execute() ;
$blog=$select->fetchAll(pdo::FETCH_ASSOC) ;  // fetchAll : ke hame etelaat neshun dade beshan
//var_dump($blog) ;  // namayeshe etelaat roye safhe sayt baraye Teste didane khodemun baraye 

include '../includes/menu admin.php';
?>
<!doctype html>
<html>
<head>  
	<meta charset="UTF-8">
	<meta http-equiv="" content="" > 
	<meta name="viewport" content="width=device-width , initial-scale=1.0" >
		<title> پنل ادمین - صفحه مقاله‌ها</title>
	<link rel="stylesheet" href="../CSS/fonts.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/bootstrap.css" >
	<link rel="stylesheet" href="../CSS/style.css" >
</head> 
<body dir="rtl">

<div class="col-lg-12 col-md-12 col-sm-12">	
<div class="container">

<?php $time=jdate('H:i:s'); ?>
<?php $date=jdate('Y/m/d'); ?>

		<h3 class="title-blog"> مشاهده مقالات منتشر شده </h3>
		
		<table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
<!--      <th scope="col"> نام نویسنده </th>-->
      <th scope="col" > موضوع </th>
	  <th scope="col"> عکس مقاله </th>
      <th scope="col"> نویسنده </th>
      <th scope="col"> زمان تقریبی مطاله </th>
      <th scope="col"> تگ ها </th>
	  <th scope="col"> ساعت انتشار </th>
      <th scope="col"> تاریخ انتشار </th>
<!--      <th scope="col"> ساعت ادیت </th>-->
<!--      <th scope="col"> تاریخ ادیت </th>-->
      <th scope="col"> عملیات </th>
    </tr>
  </thead>
	<?php foreach($blog as $blog_info):?>
  <tbody>
      <th scope="row"><?= $number++; ?></th> <!-- $number dar khate 7 tarif shode ast va hatman bayad dar khate 7 tarif shavad ke khata nadashte bahsad -->
 <!-- be jaye Dasture echo az <?//= // ba alamate = estefade karde va sepas ba alamate ?> baste mishavad -->
<!--	  <td><?//= $//blog_info['username'] ?></td> -->
	  <td><?= $blog_info['title'] ?></td> 
      <td><img class="panel-img-writer-and-blog" src="<?= $blog_info['image'] ?>" alt="عکس گذاشته نشده است" width="100px;"></td>
	  <td class="text-center"><?= $blog_info['writer'] ?></td>
	  <td class="text-center"><?= $blog_info['readtime'] ?></td>
	  <td><?= $blog_info['tags'] ?></td>
	  <td><?= $blog_info['time'] ?></td>
	  <td><?= $blog_info['date'] ?></td>
<!--	  <td><?//= $blog_info['time_edit'] ?></td>-->
<!--	  <td><?//= $blog_info['date_edit'] ?></td>-->
	  
	  <td><a href="delete-blog.php?id=<?= $blog_info['id']; ?>" class="btn btn-danger"> حذف </a> <a href="edit-blog.php?id=<?= $blog_info['id']; ?>" class="btn btn-warning"> ویرایش </a></td>
    </tr>
  </tbody>
	<?php endforeach; ?>
</table>

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