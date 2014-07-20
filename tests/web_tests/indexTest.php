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

    function testHtmlResponse()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/', [], [], ['HTTP_ACCEPT' => 'text/html']);
        $response = $client->getResponse();
        $headers = $response->headers;

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'text/html; charset=UTF-8'));

        $this->assertEquals('Inscriptus Index', $crawler->filter('#title[rel=canonical]')->text());
        $this->assertEquals('http://localhost/', $crawler->filter('#title[rel=canonical]')->attr('href'));
        $this->assertEquals(4, $crawler->filter('#rels')->children()->count());
        $this->assertEquals(0, $crawler->filter('#rels a[rel=root]')->count());
        $this->assertEquals('http://localhost/posts/', $crawler->filter('#rels a[rel=posts]')->attr('href'));
        $this->assertEquals('http://localhost/pages/', $crawler->filter('#rels a[rel=pages]')->attr('href'));
        $this->assertEquals('http://localhost/tags/', $crawler->filter('#rels a[rel=tags]')->attr('href'));
        $this->assertEquals('http://localhost/users/', $crawler->filter('#rels a[rel=users]')->attr('href'));
        $this->assertEquals(0, $crawler->filter('#items')->count());
        $this->assertEquals(0, $crawler->filter('#actions')->count());
        $this->assertEquals(0, $crawler->filter('#propertiess')->count());
    }
}
