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
    private $contentType;
    
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
        return $this;
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

    public function asJson()
    {
        //@TODO LOGIC
        $this->strategy = "json";
        return $this;
    }

    public function asXml()
    {
        //@TODO LOGIC
        $this->strategy = "xml";
        return $this;
    }

    public function asHtml()
    {
        //@TODO LOGIC
        $this->strategy = "html";
        return $this;
    }

    public function body()
    {
        //@TODO Refactor this out into strategies
        return '{ "message": "Hello, world!" }';
    }

    public function contentType()
    {
        //@TODO Refactor this out into strategies
        return $this->contentType;
    }

    public function asContentType($contentType)
    {
        //@TODO Refactor method to use better logic

        $contentType = split(",", $contentType);

        $accepted = array(
                "application/json",
                "applicaiton/xml",
                "text/html"
            );
        $conversion = array(
                "application/json" => "asJson",
                "applicaiton/xml" => "asXml",
                "text/html" => "asHtml"
            );

        try {
            $matches = array_intersect($contentType, $accepted);

            if (empty($contentType)) {
                $this->contentType = "application/json";
                $this->asJson();
            } else {
                $this->contentType = $matches[0];
                $this->$conversion[$matches[0]];
            }

            return $this;
        } catch (\Exception $e) {
        }
    }

}
