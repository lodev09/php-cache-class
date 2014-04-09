PHP Cache Class (File base)
============================
A simple file based cache based from Erik Giberti's FileCache class. See [here](http://af-design.com/blog/2010/07/30/simple-file-based-caching-in-php/)

## Enhanced Features
* Data is serialized and JSON encoded
* Cache data is encrypted by `mcrypt`
* File Based Cache was explained [here](http://af-design.com/blog/2010/07/30/simple-file-based-caching-in-php/)

## Installation
```php
//require the class
require_once("lib/class.cache.php");

//create new instance of the class
$cache = new Cache("tmp/");

...
```

## Sample Call
```php
$cache_key = "client_list";

//see if we can get an existing cache
if (!$clients_data = $cache->get($cache_key)) {
    //nope. Let's get the real one!
    $clients_data = json_decode(file_get_contents("clients.json"));

    $expire = 3600; //1 hour
    //set the cache up!
    $cache->set($cache_key, $clients_data, $expire); 
}

var_dump($clients_data);
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
See code to see all private methods used like `Cahce::_encrypt($pure_string)` etc.

## Feedback
All bugs, feature requests, pull requests, feedback, etc., are welcome. Visit my site at [www.lodev09.com](http://www.lodev09.com "www.lodev09.com") or email me at [lodev09@gmail.com](mailto:lodev09@gmail.com)

## Credits
&copy; 2011-2014 - Coded by Jovanni Lo / [@lodev09](http://twitter.com/lodev09)  

## License
Released under the [MIT License](http://opensource.org/licenses/MIT).
See [LICENSE](LICENSE) file.
