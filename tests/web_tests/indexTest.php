<?php

use Silex\WebTestCase;

class IndexPageTest extends WebTestCase
{
    function createApplication()
    {
        return require __DIR__ . '/../../app.php';
    }

    function testSirenResponse()
    {
        $client = $this->createClient();
        $client->request('GET', '/', [], [], ['ACCEPT' => 'application/vnd.siren+json']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = json_decode($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/json'));

        $this->assertEquals('Inscriptus Index', $content->title);
        $this->assertEquals('self', $content->links[0]->rel[0]);
        $this->assertEquals('http://localhost/', $content->links[0]->href);
    }

    function testHalResponse()
    {
        $client = $this->createClient();
        $client->request('GET', '/', [], [], ['ACCEPT' => 'application/vnd.hal+json']);
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = json_decode($response->getContent());

        $this->assertTrue($response->isOk());
        $this->assertTrue($headers->contains('Content-Type', 'application/json'));

        $this->assertNotNull('self', $content->_links['self']);
        $this->assertEquals('http://localhost/', $content->_links['self']->href);
    }
}
