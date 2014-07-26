<?php

namespace Inscriptus\API\Pages\Models;

class PageCollection extends Inscriptus\API\Contracts\Abstracts\Collection 
{
    public function __construct()
    {
        parent::__construct("Page");
    }
}
