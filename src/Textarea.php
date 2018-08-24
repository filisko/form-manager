<?php

namespace FormManager;

use Exception;

/**
 * Class representing a HTML textarea element
 */
class Textarea extends Node
{
    protected $labels = [];

    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function __get(string $name)
    {
        if ($name === 'value') {
            return $this->innerHtml;
        }

        return parent::__get($name);
    }

    public function __set(string $name, $value)
    {
        if ($name === 'value') {
            $this->innerHtml = self::escape($value);
            return;
        }

        return parent::__set($name, $value);
    }
}
