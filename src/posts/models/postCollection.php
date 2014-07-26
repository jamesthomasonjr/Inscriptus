<?php

namespace Inscriptus\API\Posts\Models;

class PostCollection extends Inscriptus\API\Contracts\Abstracts\Collection 
{
    public function __construct()
    {
        parent::__construct("Post");
    }
}
