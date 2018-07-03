PHP FileCache Class (File base)
============================
A simple file based cache based from Erik Giberti's FileCache class. See [here](http://af-design.com/blog/2010/07/30/simple-file-based-caching-in-php/)

## Enhanced Features

* Data is serialized and JSON encoded
* Cache data is encrypted by `mcrypt`
* File Based Cache was explained [here](http://af-design.com/blog/2010/07/30/simple-file-based-caching-in-php/)

## Installation

Run the following command in your command line shell in your php project

```sh
$ composer require rothkj1022/php-cache-class
```

Done.

You may also edit composer.json manually then perform ```composer update```:

```
"require": {
    "rothkj1022/php-cache-class": "^2.1.0"
}
```

## Getting started

### Example usage with composer

```php
//load composer packages
require('vendor/autoload.php');

//create new instance of the class
use rothkj1022\FileCache;
$cache = new FileCache\FileCache("tmp/");
```

### Example usage without composer

```php
//require the class
require_once("lib/FileCache.php");

//create new instance of the class
use rothkj1022\FileCache;
$cache = new FileCache\FileCache("tmp/");

//...
```

### Local file source example

```php
$cache_key = "client_list";

//see if we can get an existing cache
if (!$clients_data = $cache->get($cache_key)) {
    //nope. Let's get the real one!
    $clients_data = json_decode(file_get_contents("clients.json"));

    //set the cache up!
    $expire = 3600; //1 hour
    $cache->set($cache_key, $clients_data, $expire);
}

var_dump($clients_data);
```

### External http GET request example
```php
$uri = 'https://raw.githubusercontent.com/bahamas10/css-color-names/master/css-color-names.json';
$remote_data = $cache->file_get_contents($uri);
var_dump($remote_data);
```

## Reference

Code reference for you to get started!

### Properties

* `protected $root = '/tmp/';` - Value is pre-pended to the cache, should be the full path to the directory.
* `protected $error = null;` - For holding any error messages that may have been raised
* `private $_encryption_key = 'Fil3C@ch33ncryptionK3y'` - Main key used for encryption (you need to set this up inside the class)

### Methods

#### Public Methods

* `Cache::get($key)` - Reads the data from the cache specified by the cache key
* `Cache::set($key [, $data, $ttl])` - Saves data to the cache. Anything that evaluates to false, null, '', boolean false, 0 will not be saved. `$ttl` Specifies the expiry time
* `Cache::delete($key)` - Deletes the cache specified by the `$key`
* `Cache::get_error()` - Reads and clears the internal error
* `Cache::have_error()` - Can be used to inspect internal error

#### Private Methods

See code to see all private methods used like `Cache::_encrypt($pure_string)` etc.

## Changelog

### Version 2.1.3

* Fixed: Stopped echoing guzzle request errors to screen

### Version 2.1.2

* Integrated guzzle for more efficient http get requests

### Version 2.1.1

* Changed: Renamed class back to Erik Giberti's original name, FileCache

### Version 2.1.0

* Added: Composer integration
* Added: changelog

## Credits

2010 - Authored by Erik Giberti
2011-2014 - Rewritten by Jovanni Lo / [@lodev09](https://twitter.com/lodev09)
2018 - Modified by Kevin Roth / [@rothkj1022](https://twitter.com/rothkj1022)

## License

Released under the [MIT License](http://opensource.org/licenses/MIT).
See [LICENSE](LICENSE) file.
