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
        $client->request('GET', '/', [], [], ['HTTP_ACCEPT' => 'application/json']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = json_decode($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/json'));

        $this->assertEquals('Inscriptus Index', $content->title);
        $this->assertEquals('http://localhost/', $content->href);
        $this->assertEquals(4, count((array)$content->rels));
        $this->assertNull($content->rels->index);
        $this->assertEquals('http://localhost/posts/', $content->rels->posts->href);
        $this->assertEquals('http://localhost/pages/', $content->rels->pages->href);
        $this->assertEquals('http://localhost/tags/', $content->rels->tags->href);
        $this->assertEquals('http://localhost/users/', $content->rels->users->href);
        $this->assertNull($content->items);
        $this->assertNull($content->actions);
        $this->assertNull($content->properties);
    }

    function testXmlResponse()
    {
        $client = $this->createClient();
        $client->request('GET', '/', [], [], ['HTTP_ACCEPT' => 'application/xml']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = simplexml_load_string($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/xml'));

        $this->assertEquals('Inscriptus Index', $content->title);
        $this->assertEquals('http://localhost/', $content->href);
        $this->assertNotEmpty($content->rels);
        $this->assertEmpty($content->rels->index);
        $this->assertEquals('http://localhost/posts/', $content->rels->posts->href);
        $this->assertEquals('http://localhost/pages/', $content->rels->pages->href);
        $this->assertEquals('http://localhost/tags/', $content->rels->tags->href);
        $this->assertEquals('http://localhost/users/', $content->rels->users->href);
        $this->assertEmpty($content->items);
        $this->assertEmpty($content->actions);
        $this->assertEmpty($content->properties);
    }
}
