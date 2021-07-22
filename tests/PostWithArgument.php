<?php


namespace Mehedi\NewInstance\Tests;

use Mehedi\NewInstance\NewInstance;

class PostWithArgument
{
    use NewInstance;

    public $data;
    public $data2;


    public function __construct($data, $data2)
    {
        $this->data = $data;
        $this->data2 = $data2;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getData2()
    {
        return $this->data2;
    }

}
