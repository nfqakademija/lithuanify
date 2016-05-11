<?php

namespace LithuanifyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 * @package LithuanifyBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     *
     */
    public function testResponseCode()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), $client->getResponse()->getContent());
    }

    /**
     *
     */
    public function testIfFormExist()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertContains('<form', $client->getResponse()->getContent());
    }
}
