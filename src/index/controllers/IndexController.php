<?php

namespace Inscriptus\API\Index\Controllers;
 
use \Symfony\Component\HttpFoundation\Response;
use \Inscriptus\API\Core\Services\HyperMediaFactory;
use \Inscriptus\API\Core\Models\HyperMediaSerializer;

class IndexController
{
    private $hyperMediaFactory;
    private $hyperMediaSerializer;
    private $accepted;

    public function __construct(
        HyperMediaFactory $hyperMediaFactory,
        HyperMediaSerializer $hyperMediaSerializer,
        $accepted)
    {
        $this->hyperMediaFactory = $hyperMediaFactory;
        $this->hyperMediaSerializer = $hyperMediaSerializer;
        $this->accepted = (string) $accepted;
    }

    public function index()
    { 
        $hypermedia = $this->hyperMediaFactory->index();
        $body = $this->hyperMediaSerializer->serialize($hypermedia);

        $status = 200;
        $headers = ['content-type' => $this->accepted];

        return new Response($body, $status, $headers);
    }
}
