# New Instance
Create new instance of a class and chain method without storing in variable.

## Installation
To install this package via `composer`, just run the following command on your terminal.
```bash
composer require mehedimi/new-instance
```
## Uses
Just use the `Mehedi\NewInstance\NewInstance` trait in your any PHP class
```php
<?php
use Mehedi\NewInstance\NewInstance;

class Post
{
    use NewInstance;
    
    public function find()
    {
        //
    }
}

// Then 
Post::newInstance()->find();
```
Or you can create singleton instance of any PHP class.
```php
<?php
$post1 = Post::newSingleInstance();
$post2 = Post::newSingleInstance();

// Here $post1 and $post2 object are same
```
Also, you can accept one or many arguments on class constructor
```php
use Mehedi\NewInstance\NewInstance;

class Post
{
    use NewInstance;
    
    public function __construct($hello, $word)
    {
        //
    }
}
Post::newSingleInstance('hello', 'word');
// OR
Post::newInstance('hello', 'word');
```
