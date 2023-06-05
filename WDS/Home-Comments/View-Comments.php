<?php
session_start();
// gereftan maghalat az database blogs va namayesh dar site
include '../database/db.php';

// namayeshe comment va username dar safhe site		    	 WHERE user_comment_id=?
$select_show_user_comment = $conn->prepare("SELECT * FROM shafaye1_weblog_ketab_sara.home_comments ORDER BY id DESC");
// $select_show_user_comment->bindValue(1, $id);
$select_show_user_comment->execute();
$show_user_comments = $select_show_user_comment->fetchAll(PDO::FETCH_ASSOC);
//** (end code namayeshe comment)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title> دیدن نظرات </title>
</head>

<body class="home-view-comments">
    <div>

        <?php
        foreach ($show_user_comments as $show_user_comment) { ?>
            <div class="user-coment">
                <h3><?= $show_user_comment['user_comment_id'] ?><br></h3>
                <p><?= $show_user_comment['text'] ?></p>
            </div>
        <?php } ?>
    </div>
</body>

</html>