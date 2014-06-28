<?php

namespace Inscriptus\API\Index\Controllers;
 
use \Symfony\Component\HttpFoundation\Response;

class IndexController
{

    public function __construct()
    {
    }

    public function index()
    {
        $body = '{ "message": "Hello, world!" }';
        $status = 200;
        $headers = ['content-type' => 'application/json'];

        return new Response($body, $status, $headers);
    }
}
