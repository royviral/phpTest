<?php
// require 'facebook/facebook.php';
// Pass session data over.
session_start();
 
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

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost:8012/phpTestApp/application/verify.php', $permissions);


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
        <h3 class="display-3">Access App With Facebook Login</h3>
        
        <p><a class="btn btn-lg btn-info" href="<?php echo htmlspecialchars($loginUrl);?>" role="button">Login With Facebook</a></p>
      </div>

    </div> <!-- /container -->  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>