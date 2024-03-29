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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Testing Twitter API</title>
	<link rel="stylesheet" type="text/css" href="dist/main.min.css">
</head>
<body>
<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h2>Twitter 1.1 API Test</h2>
				<p class="lead">Implementation of Twitter API 1.1 with PHP.</p>
			</div>
		</div>
	</div>
</header>


<section class="tweetSlider">
	<div id="tweetSlider" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#tweetSlider" data-slide-to="0" class="active"></li>
	    <li data-target="#tweetSlider" data-slide-to="1" class=""></li>
	    <li data-target="#tweetSlider" data-slide-to="2" class=""></li>
	    <li data-target="#tweetSlider" data-slide-to="3" class=""></li>
	    <li data-target="#tweetSlider" data-slide-to="4" class=""></li>
	  </ol>
	  
	  <div class="carousel-inner" role="listbox">

	  	<?php
	  	$first = true;
	  	foreach($tweets as $tweet) {
	  	?>
	  		
	  		<?php if ( $first ) { echo '<div class="item active">'; $first = false; } else { echo '<div class="item">'; } ?>
		      <?php // <img class="first-slide" src="http://placehold.it/1600x600" alt="First slide"> ?>
		      <div class="slide"></div>
		      <div class="container">
		        <div class="carousel-caption">
		          <p class="lead"><?php echo $tweet['text'];?></p>
		        </div>
		      </div>
		    </div>
	  	<?php
	  	}
	  	?>
	  </div>
	</div>
</section>



<section class="tweetList">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">

				<?php
					foreach($tweets as $tweet) {
						echo '<div class="well tweet">';
						echo '<h4>' . $tweet['text'] . '</h4>';
						echo '<div class="meta">' . $tweet['created_at'] . '&nbsp;by&nbsp;' . $tweet['user']['screen_name'] . '</div>';
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
	$('.carousel-caption p.lead').autolink();
	
});
</script>
</body>
</html>