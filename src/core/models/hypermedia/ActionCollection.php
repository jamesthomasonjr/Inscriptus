<?php

namespace Inscriptus\API\Core\Models\HyperMedia;

class ActionCollection extends \Inscriptus\API\Contracts\Abstracts\Collection 
{
    public function __construct()
    {
        parent::__construct("\Inscriptus\API\Core\Models\HyperMedia\Action");
    }
}
