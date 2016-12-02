<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TweetSheet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="container">
    <?php
    require_once('TWitterAPIExchange.php');

    /**
     * Set access tokens here. Get your access tokens at: https://dev.twitter.com/apps/
    **/
    $settings = array(
      'oauth_access_token' => "",
      'oauth_access_token_secret' => "",
      'consumer_key' => "",
      'consumer_secret' => ""
    );

    $url = "https://api.twitter.com/1.1/statuses/home_timeline.json";

    ?>


  </div>

  </body>
</html>
