<?php

namespace Inscriptus\API\Contracts\Abstracts;

class Collection implements \ArrayAccess, \IteratorAggregate, \Countable
{
    private $class;
    private $data;

    public function __construct($class)
    {
        if (!is_string($class)) {
            $class = get_class($class);
        }

        $this->class = $class;
        $this->data = array();
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset] ?: null);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function count()
    {
        return count($this->data);
    }

    private function validate($value)
    {
        $valid = is_a($value, $this->class); 
        if (!valid) {
            $message =
                "Provided value is not an instance of "
                . $this->class
                . "; it will not be added to the Collection.";
            trigger_error($message, E_USER_WARNING);
        }

        return $valid;
    }
}
