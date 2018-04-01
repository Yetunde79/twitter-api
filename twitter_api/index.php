
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!--CSS-->
    <link rel="stylesheet" href="twitterstyle.css" type="text/css">

    <title>Twitter Api</title>
  </head>
  
  <body>
    <h1 class="text-center">Twitter Client</h1>
    <p class="text-center font-weight-bold"> View your most recent popular tweets</p>
	<div class ="container">
      
         <form>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInput" name="username" placeholder="Enter a username">
          </div>
           <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
           </div>
        </form>
      <div class="row justify-content-end">
        
       <?php
        require "twitteroauth/autoload.php";

        use Abraham\TwitterOAuth\TwitterOAuth;

        $consumerkey = "j6q90hEKT5zRovIeCrENo1tcS";

        $consumersecret = "ql2vTovwwi0evskSWg7PKFqfGyrIC5wMA3LRBSPImRTwGCg6o0";

        $access_token = "946419829015228416-bEwlQgwOtG58JFDvfG0yNI0GwdRghqF";

        $access_token_secret = "TSmgHLmDu1JZwk8szspl3GudpXTN1zyHldEO53P5Td7Cm";

        $connection = new TwitterOAuth($consumerkey, $consumersecret, $access_token, $access_token_secret);
        
        $content = $connection->get("account/verify_credentials");

        $statuses = $connection->get("statuses/user_timeline", ["count" => 70, "screen_name" => $_GET['username'], "exclude_replies" => true]);
	
     foreach ($statuses as $tweet) {
         if ($tweet->favorite_count >= 2) {
        
        $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
        
        echo $status->html;
           
        echo '<div class="col"></div>';
        
    }  
}
     
 ?>
     
      </div>
 </div>
    
    <footer class="opac">
      <div class="text-center">
         <small class="text-light">&copy; 2018 Yetunde Sola-Adebayo. Follow me on <a href="http://www.twitter.com/yetunde_sola" target="_blank"><strong>Twitter</strong></a>.
        </small>
      </div>
    </footer>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>