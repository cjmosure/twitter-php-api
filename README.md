Twitter API Test
================

A php example of the Twitter 1.1 API.

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

With help from:

* https://github.com/J7mbo/twitter-api-php