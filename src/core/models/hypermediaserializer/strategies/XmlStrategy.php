<?php

namespace Inscriptus\API\Core\Models\HyperMediaSerializer\Strategies;


class XmlStrategy
{
    public function serialize($hypermedia)
    {
        $output = new \SimpleXmlElement('<document></document>');
        $output->title = $hypermedia->getTitle();
        $output->href = $hypermedia->getHref();

        foreach($hypermedia->getRels() as $rel) {
            $title = $rel->getTitle();
            $output->rels->$title->href = $rel->getHref();
            $output->rels->$title->title = $rel->getTitle();
        }

        return $output->asXML();
    }
}
