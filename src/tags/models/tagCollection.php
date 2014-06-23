<?php

namespace Inscriptus\API\Tags\Models;

class TagCollection extends Inscriptus\API\Contracts\Abstracts\Collection; 
{
    public function __construct()
    {
        parent::__construct("Tag");
    }
}
