<?php

namespace Inscriptus\API\Core\Models\HyperMedia;

class Relationship
{
    private $title;
    private $href;

    /**
     * @param string $title
     * @param string $href
     */
    public function __construct($title, $href)
    {
        $this->title = $title;
        $this->href = $href;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getHref()
    {
        return $this->href;
    }
}
