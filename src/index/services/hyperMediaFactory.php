<?php

namespace Inscriptus\API\Index\Services;

use Inscriptus\API\Core\Models\HyperMedia;
 
class HyperMediaFactory extends \Inscriptus\API\Core\Services\HyperMediaFactory
{
    public function __construct()
    {
    }

    public function index()
    { 
        $hypermedia = new HyperMedia();
        
        return $hypermedia; 
    }
}
