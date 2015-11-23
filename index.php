<?php
	require_once('./app/settings.php');
	require_once('./twitter-api-php/TwitterAPIExchange.php');
?>

<?php

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=teamwebmachine&count=5';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$tweets = json_decode($response, true);


function arrayPrettyPrint($arr, $level) {
    foreach($arr as $k => $v) {
        for($i = 0; $i < $level; $i++)
            echo("&nbsp;");   // You can change how you indent here
        if(!is_array($v))
            echo($k . " => " . $v . "<br/>");
        else {
            echo($k . " => <br/>");
            arrayPrettyPrint($v, $level+1);
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gulp Template</title>
	<link rel="stylesheet" type="text/css" href="dist/main.min.css">
</head>
<body>


<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h2>Twitter 1.1 API Test</h2>
				<p class="lead">A test of the Twitter API through an php wrapper.</p>
			</div>
		</div>
	</div>
</header>


<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">

				<?php
					foreach($tweets as $tweet) {
						echo '<div class="well">';
						
						echo '<h4>' . $tweet['text'] . '</h4>';
						echo '<div class="meta">' . $tweet['created_at'] . '&nbsp;by&nbsp;' . $tweet['user']['screen_name'] . '</div>';
						//var_dump($tweet);
						//arrayPrettyPrint($tweet, 0);
						echo '</div>';
					}
				?>

			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="dist/main.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	$('.well h4').autolink();
});
</script>
</body>
</html>