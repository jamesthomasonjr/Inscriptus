<?php

namespace Inscriptus\API\Contracts\Abstracts;

class Content
{
    private $id;
    private $slug;
    private $author;
    private $editor;
    private $authored;
    private $edited;
    private $title;
    private $body;
    private $tags;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = (string) $value;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($value)
    {
        $this->slug = (string) $value;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($value)
    {
        $this->author = (int) $value;
        return $this;
    }

    public function getEditor()
    {
        return $this->editor;
    }

    public function setEditor($value)
    {
        $this->editor = (string) $value;
        return $this;
    }

    public function getAuthored()
    {
        return $this->authored;
    }

    public function setAuthored(\DateTime $value)
    {
        $this->authored = $value;
        return $this;
    }

    public function getEdited()
    {
        return $this->edited;
    }

    public function setEdited(\DateTime $value)
    {
        $this->edited = $value;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = (string) $value;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($value)
    {
        $this->body = (string) $value;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags(\ArrayAccess $value)
    {
        $this->tags = $value;
        return $this;
    }
}
