<?php

session_start();
include 'functions.php';
 if(!$_SESSION['fb_access_token']){
  header('Location: http://localhost:8012/phpTestApp/application/index.php');
}
// Include the required dependencies.
require( __DIR__.'\facebook\autoload.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
$fb = new Facebook\Facebook([
  'app_id' => '1952347121651979', // Replace {app-id} with your app id
  'app_secret' => '079194c58b317003dd6a5d8763dbab7a',
  'default_graph_version' => 'v2.10',
  ]);
//setting logout url
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$logoutUrl = 'http://localhost:8012/phpTestApp/application/logout.php';

$response = $fb->get('/me?fields=id,first_name,picture', $_SESSION['fb_access_token']);
$user = $response->getGraphUser();
$user_id = $user['id'];
$user_name =  $user['first_name'];
$profile_pic = $user['picture']['url'];
$token = $_SESSION['fb_access_token'];
insert_user($user_id,$user_name,$token,$profile_pic);

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: profile.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style type="text/css">
      body{
        background-color: #333;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header clearfix" style="text-align: center; color:#36ffc0;">
        
        <h3 class="">Php Test -Social Sweet Hearts (Roy Viral)</h3>
      </div>

      <div class="jumbotron" style="text-align: center;">
        <img src="<?php echo $profile_pic;?>">
        <h3 class="display-3">Hello, <?php echo $user_name;?></h3>
        
        <p><a class="btn btn-lg btn-info" href="<?php echo $logoutUrl;?>" role="button">Logout From Facebook</a></p>
      </div>

    </div> <!-- /container -->  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>