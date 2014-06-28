<?php

use Silex\WebTestCase;

class IndexPageTest extends WebTestCase
{
    function createApplication()
    {
        return require __DIR__ . '/../../app.php';
    }

    function testJsonResponse()
    {
        $client = $this->createClient();
        $client->request('GET', '/', [], [], ['ACCEPT' => 'application/json']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = json_decode($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/json'));

        $this->assertEquals('Inscriptus Index', $content->title);
        $this->assertEquals('http://localhost/', $content->href);
        $this->assertEquals(3, count($content->rels));
        $this->assertNull($content->rels['index']);
        $this->assertEquals('http://localhost/posts/', $content->rels['posts']);
        $this->assertEquals('http://localhost/pages/', $content->rels['pages']);
        $this->assertEquals('http://localhost/users/', $content->rels['users']);
        $this->assertNull($content->items);
        $this->assertNull($content->actions);
    }

    function testXmlResponse()
    {
        $client = $this->createClient();
        $client->request('GET', '/', [], [], ['ACCEPT' => 'application/xml']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = simplexml_load_string($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/xml'));

        $this->assertEquals('Inscriptus Index', $content->title);
        $this->assertEquals('http://localhost/', $content->href);
        $this->assertNotNull($content->rels);
        $this->assertNull($content->rels->index);
        $this->assertEquals('http://localhost/posts/', $content->rels->posts);
        $this->assertEquals('http://localhost/pages/', $content->rels->pages);
        $this->assertEquals('http://localhost/users/', $content->rels->users);
        $this->assertNull($content->items);
        $this->assertNull($content->actions);
    }
}
