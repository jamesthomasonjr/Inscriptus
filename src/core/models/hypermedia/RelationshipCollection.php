<?php

namespace Inscriptus\API\Core\Models\HyperMedia;

class RelationshipCollection extends \Inscriptus\API\Contracts\Abstracts\Collection 
{
    public function __construct()
    {
        parent::__construct("\Inscriptus\API\Core\Models\HyperMedia\Relationship");
    }
}
