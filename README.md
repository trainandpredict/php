# T&P PHP Package

This Composer package allows you to interact with our API with just a few lines of code.

https://trainandpredict.com

## Quickstart

```
composer require trainandpredict/php
```

Then in your PHP project, you can call the API as follows:

```php
<?php
                        
require __DIR__ . '/vendor/autoload.php';

$tap = new Tap\Client('{{ $api_tokens->first()->token }}');

// Log an event for user ID 1234 on item ID 5678
$tap->log(1234, 5678);

// Get recommendations for user ID 1234
$user_rec = $tap->recommendationsForUser(1234);

// Get recommendations for item ID 5678
$item_rec = $tap->recommendationsForItem(5678);
```