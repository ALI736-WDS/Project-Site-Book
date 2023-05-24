<?php
	session_start() ;
	session_destroy() ;  // session haye ghabli ke set shode budan ro hazf kon | meshe az session_unset() ham estefade kard vali session_destroy() behtare
	header('location:../../index.php') ;
?>