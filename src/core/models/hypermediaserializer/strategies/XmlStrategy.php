<?php

namespace Inscriptus\API\Core\Models\HyperMediaSerializer\Strategies;


class XmlStrategy
{
    public function serialize($hypermedia)
    {
        $output = new \SimpleXmlElement('<document></document>');
        $output->addChild('title', $hypermedia->getTitle());
        $output->addChild('href', $hypermedia->getHref());

        if(count($hypermedia->getRels())) {
            $relsNode = $output->addChild('rels');
 
            foreach($hypermedia->getRels() as $rel) {
                $title = $rel->getTitle();

                $relNode = $relsNode->addChild($title);

                $relNode->addChild('href', $rel->getHref());
                $relNode->addChild('title', $rel->getTitle());
            }
       }

        return $output->asXML();
    }
}
