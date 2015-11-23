Twitter API Test
================

A php example of the Twitter 1.1 API. With help from:

You'll need to create a `settings.php` file in `app/` with these values (use https://apps.twitter.com/ to generate a new app):

```
<?php
$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);
?>
```

* http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1/15314662#15314662
* https://github.com/J7mbo/twitter-api-php