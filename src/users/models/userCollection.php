<?php

namespace Inscriptus\API\Users\Models;

class UserCollection extends Inscriptus\API\Contracts\Abstracts\Collection; 
{
    public function __construct()
    {
        parent::__construct("User");
    }
}
