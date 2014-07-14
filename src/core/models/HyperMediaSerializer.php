<?php

namespace Inscriptus\API\Core\Models;


class HyperMediaSerializer
{
    private $strategy;
    
    public function __construct($contentType)
    {
        $contentType = ucfirst(split('/', $contentType)[1]);

        $strategy = (string) "\Inscriptus\API\Core\Models\HyperMediaSerializer\Strategies\\" . $contentType . "Strategy";
        $this->strategy = new $strategy();
    }

    public function serialize($hypermedia)
    {
        return $this->strategy->serialize($hypermedia);
    }
}
