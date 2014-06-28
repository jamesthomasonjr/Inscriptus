<?php

use Silex\WebTestCase;

class IndexPageTest extends WebTestCase
{
    function createApplication()
    {
        return require __DIR__ . '/../../app.php';
    }

    function testFailOnPurpose()
    {
        $this->assertEquals(false, true);
    }
}
