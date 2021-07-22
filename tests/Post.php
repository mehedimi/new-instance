<?php

namespace Mehedi\NewInstance\Tests;


use Mehedi\NewInstance\NewInstance;

class Post
{
    use NewInstance;

    function find()
    {
        return $this;
    }
}
