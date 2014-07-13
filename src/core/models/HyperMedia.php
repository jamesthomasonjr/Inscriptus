<?php

namespace Inscriptus\API\Core\Models;

use HyperMedia\ActionCollection;
use HyperMedia\ItemCollection;
use HyperMedia\RelationshipCollection;

class HyperMedia
{
    private $title;
    private $href;
    private $items;
    private $rels;
    private $actions;
    
    public function __construct()
    {
        $this->title = "";
        $this->href = "";
        $this->items = null;
        $this->rels = null;
        $this->actions = null;
    }

    public function setTitle($title)
    {
        $this->title = (string) $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setHref($href)
    {
        $this->href = (string) $href;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function setActions(ActionCollection $actions)
    {
        $this->actions = $actions;
        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function setItems(ItemCollection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setRels(RelationshipCollection $rels)
    {
        $this->rels = $rels;
        return $rels;
    }

    public function getRels()
    {
        return $this->rels;
    }
}
