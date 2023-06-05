<?php //session_start(); 
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand img-jeld-ketab-menu" href="../../index.php"> <img src="../Image/Jeld Ketab 2.jpg" class="img-menu" alt="شفای الهی" height="50px"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-color-menu" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="../../index.php"> خانه <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <?php if ($_SESSION['roll'] == 2) { ?>
            <a class="nav-link" href="../Admin/panel-admin.php"> پنل ادمین </a>
          <?php } ?>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="../Contact-Us/contact-us.php"> تماس با ما </a>
        </li> 
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"> درباره ما </a>
        </li> -->
     
        <?php if (!isset($_SESSION['login'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="../register/register.php"> ثبت نام </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../register/login.php"> ورود </a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="../register/logout.php"> خروج </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>