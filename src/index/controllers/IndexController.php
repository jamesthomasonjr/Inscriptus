<?php

namespace Inscriptus\API\Index\Controllers;
 
use \Symfony\Component\HttpFoundation\Response;
use \Inscriptus\API\Core\Services\HyperMediaFactory;

class IndexController
{
    private $hyperMediaFactory;
    private $accepted;

    public function __construct(HyperMediaFactory $hyperMediaFactory, $accepted)
    {
        $this->hyperMediaFactory = $hyperMediaFactory;
        $this->accepted = (string) $accepted;
    }

    public function index()
    { 
        $hypermedia = $this->hyperMediaFactory->index()->asContentType($this->accepted);

        $status = 200;
        $body = $hypermedia->body();
        $headers = ['content-type' => $hypermedia->contentType()];

        return new Response($body, $status, $headers);
    }
}
