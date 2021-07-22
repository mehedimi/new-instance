<?php
namespace Mehedi\NewInstance\Tests;

use PHPUnit\Framework\TestCase;

class NewInstanceTest extends TestCase
{
    /**
    * @test
    **/
    function it_can_make_a_instance()
    {
        $post = Post::newInstance();
        $post2 = Post::newInstance();

        $this->assertInstanceOf(Post::class, $post);

        $this->assertFalse(($post->find() === $post2->find()));
    }

    /**
    * @test
    **/
    function it_can_chain_class_method()
    {
        $post = Post::newInstance()->find();

        $this->assertInstanceOf(Post::class, $post);
    }

    /**
    * @test
    **/
    function it_can_accept_arguments()
    {
        $data = 'data';
        $data2 = 'data2';

        $instance = PostWithArgument::newInstance($data, $data2);

        $this->assertEquals($data, $instance->getData());
        $this->assertEquals($data2, $instance->getData2());
    }

    /**
    * @test
    **/
    function make_new_instance_everytime()
    {
        $instance = PostWithArgument::newInstance('data1', 'data2');

        PostWithArgument::newInstance('data3', 'data4');

        $this->assertEquals('data1', $instance->getData());
        $this->assertEquals('data2', $instance->getData2());
    }


    /**
    * @test
    **/
    function it_can_make_a_singletone_instance()
    {
        $instance1 = Post::newSingleInstance();
        $instance2 = Post::newSingleInstance();

        $this->assertTrue(($instance1->find() === $instance2->find()));

        $this->assertEquals($instance1, $instance2);

        $post1 = PostWithArgument::newSingleInstance('data1', 'data2');
        $post1->data = 'data_update';
        $post2 = PostWithArgument::newSingleInstance('data1', 'data2');
        $this->assertEquals('data_update', $post2->data);
        $post2->data2 = 'data2_update';
        $this->assertEquals('data2_update', $post1->data2);
    }

    /**
    * @test
    **/
    function it_can_clear_single_instance()
    {
        $post = Post::newSingleInstance();
        Post::clearSingleInstance();
        $post2 = Post::newSingleInstance();
        $this->assertFalse(($post->find() === $post2->find()));
    }
}
