<?php

use Silex\WebTestCase;

class envVariableTest extends WebTestCase
{
    function createApplication()
    {
        return require __DIR__ . '/../../app.php';
    }

    function testEnvironmentVariableIsSetToTest()
    {
        $this->assertEquals('test', $this->app['env']);
    }
}
