<?php //session_start(); ?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand img-jeld-ketab-menu" href="../../index.php"> <img src="../Image/Jeld Ketab 2.jpg" class="img-menu" alt="شفای الهی"  height="50px"></a>
	
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
	
  <div class="collapse navbar-collapse bg-color-menu" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../Admin/panel-admin.php"> خانه <span class="sr-only">(current)</span></a>
      </li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          مقالات
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add-blog.php"> افزودن مقاله </a>
          <a class="dropdown-item" href="view-blogs.php"> مشاهده مقالات </a>
        </div>
      	</li>
		<li class="nav-item dropdown">
			<?php if($_SESSION['roll_panel_admin']==2){ ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          نویسندگان
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add-writer.php"> افزودن نویسنده </a>
          <a class="dropdown-item" href="view-writers.php"> مشاهده نویسندگان </a>
        </div>
			<?php } ?>
      	</li>
		
		<li class="nav-item dropdown">
			<?php if($_SESSION['roll_panel_admin']==2){ ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          لینک‌ها
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add-link.php"> افزودن لینک </a>
          <a class="dropdown-item" href="view-links.php"> مشاهده لینک‌ها </a>
        </div>
			<?php } ?>
      	</li>
      <li class="nav-item">
      		<?php if($_SESSION['roll_panel_admin']==2){ ?>
        <a class="nav-link" href="view-users.php"> کاربران </a>
        	<?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view-comments.php"> نظرات کاربران </a>
      </li>
    </ul>
  </div>
</nav>
</header>