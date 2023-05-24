<?php
session_start();

if($_SESSION['roll']!=2)
{
	header('location:../../index.php') ;
}

include '../includes/jdf.php' ;
include '../database/db.php' ;

$number=1 ;
$select=$conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.writers ORDER BY id") ;
$select->execute() ;
$writer=$select->fetchAll(PDO::FETCH_ASSOC) ;  // fetchAll : ke hame etelaat neshun dade beshan
//var_dump($writer) ;  // namayeshe etelaat roye safhe sayt baraye Teste didane khodemun baraye 

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

<?php $time=jdate('H:i:s'); ?>
<?php $date=jdate('Y/m/d'); ?>
	
		<h3 class="title-blog"> مشاهده نویسندگان </h3>
		
<table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col"> نام نویسنده </th>
      <th scope="col"> عکس نویسنده </th>
	  <th scope="col"> ساعت ثبت </th>
	  <th scope="col"> تاریخ ثبت </th>
      <th scope="col"> عملیات </th>
    </tr>
  </thead>
	<?php foreach($writer as $writer_info):?>
  <tbody>
      <th scope="row"><?= $number++; ?></th> <!-- $number dar khate 7 tarif shode ast va hatman bayad dar khate 7 tarif shavad ke khata nadashte bahsad -->
 <!-- be jaye Dasture echo az <?//= // ba alamate = estefade karde va sepas ba alamate ?> baste mishavad -->
	  <td><?= $writer_info['username'] ?></td> 
      <td><img class="panel-img-writer-and-blog" src="<?= $writer_info['image'] ?>" alt="عکس گذاشته نشده است" width="100px;"></td>
	  <td><?= $writer_info['time'] ?></td>	  
	  <td><?= $writer_info['date'] ?></td>
	  <td><a href="delete-writer.php?id=<?= $writer_info['id']; ?>" class="btn btn-danger"> حذف </a> 
	  <a href="edit-writer.php?id=<?= $writer_info['id']; ?>" class="btn btn-warning"> ویرایش </a></td>
    </tr>
  </tbody>
	<?php endforeach; ?>
</table>

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