<?php 
	session_start();
    session_unset('fb_access_token');
    header('Location: http://localhost:8012/phpTestApp/application/index.php');
 ?>