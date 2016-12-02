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
    require_once('twitter-api-php/TWitterAPIExchange.php');

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

    $requestMethod = "GET";
    $getfield = '?screen_name=iagdotme&count=50';
    $twitter = new TwitterAPIExchange($settings);
    $string = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);
    if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

    /**
     * Uncomment the following line to see all the information available from
     * Twitter.
    **/
    // echo "<pre>" . print_r($string) . "</pre>";

    echo '<table class="table table-bordered table-condensed table-striped">';

    // Create the "spreadsheet"
    echo '<thead><tr><th>Date Created</th><th>Tweet</th><th>Username</th><th>Screenname</th></tr></thead>';

    echo '<tbody>';

    foreach($string as $items) {
      $created_at = $items['created_at'] = date("n/j/Y, g:i a");

      echo '<tr>';
      echo '<td>' . $created_at . '</td>';
      echo '<td>' . $items['text'] . '<br><a href="https://www.twitter.com/' . $items['user']['screen_name'] . '/status/' . $items['id'] . '" target="_blank">permalink</a></td>';
      echo '<td>' . $items['user']['name'] . '</td>';
      echo '<td><a href="https://www.twitter.com/' . $items['user']['screen_name'] . '" target="_blank">@' . $items['user']['screen_name'] . '</a></td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
  </div>

  </body>
</html>
