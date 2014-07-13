<?php

namespace Inscriptus\API\Core\Services;

class HyperMediaFactory
{
    protected $url;
    public function __construct($url)
    {
        $this->url = $url;
    }
}
