<?php

namespace Inscriptus\API\Index\Services;

use Inscriptus\API\Core\Models\HyperMedia;
use Inscriptus\API\Core\Models\HyperMedia\Relationship;
use Inscriptus\API\Core\Models\HyperMedia\RelationshipCollection;
use Inscriptus\API\Core\Models\HyperMedia\Item;
use Inscriptus\API\Core\Models\HyperMedia\ItemCollection;
use Inscriptus\API\Core\Models\HyperMedia\Action;
use Inscriptus\API\Core\Models\HyperMedia\ActionCollection;
 
class HyperMediaFactory extends \Inscriptus\API\Core\Services\HyperMediaFactory
{
    public function index()
    { 
        $hypermedia = new HyperMedia();
        $hypermedia->setTitle("Inscriptus Index");
        $hypermedia->setHref($this->url);

        $rels = new RelationshipCollection();
        $rels[] = new Relationship("posts", $this->url . "posts/");
        $rels[] = new Relationship("pages", $this->url . "pages/");
        $rels[] = new Relationship("tags", $this->url . "tags/");
        $rels[] = new Relationship("users", $this->url . "users/");
        $hypermedia->setRels($rels);

        $items = new ItemCollection();
        $hypermedia->setItems($items);

        $actions = new ActionCollection();
        $hypermedia->setActions($actions);
         
        return $hypermedia; 
    }
}
