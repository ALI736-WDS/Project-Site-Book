<?php
session_start();
// gereftan maghalat az database blogs va namayesh dar site
include '../database/db.php';

// sabte (comment)
if (isset($_POST['home-submit'])) {
    $user_comment_id = $_POST['username'];  // ($_session) bekhatere inke be safahate dige yani safhe sabtenam dastresi dashte bashe va agar karbar sabtenam nakarde bun , natune vared beshe
    $text = $_POST['textarea-comment'];

    $select_record_comment = $conn->prepare("INSERT INTO shafaye1_weblog_ketab_sara.home_comments SET user_comment_id=? , text=?");
    // $select_record_comment->bindValue(1, $id);
    $select_record_comment->bindValue(1, $user_comment_id);
    $select_record_comment->bindValue(2, $text);
    $select_record_comment->execute();
} //** (end code sabte comment)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title> ثبت نظر </title>
</head>

<body>
    <div class="coment2 record-comment col-lg-12 col-md-12 col-sm-12">
        <h5> دیدگاهتان را بنویسید </h5>
        <!-- <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script> -->
        <form class="record-comment " action="" method="post">
            <input type="text" name="username" placeholder="نام خود را وارد کنید" class="mb-3 w-50">
            <textarea class="col-lg-12 col-md-12 col-sm-12" name="textarea-comment" rows="20" cols="100" placeholder="نظر خود را وارد کنید"></textarea>
            <!-- <script>
                    CKEDITOR.replace('editor1');
                </script> -->
            <input type="submit" name="home-submit" class="btn btn-success btnsubmit" value="ثبت دیدگاه">
        </form>
    </div>
</body>

</html>