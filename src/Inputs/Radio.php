<?php
declare(strict_types = 1);

namespace FormManager\Inputs;

use FormManager\InputInterface;

/**
 * Class representing a HTML input[type="radio"] element
 */
class Radio extends Input
{
    protected $format = '{input} {label}';

    public function __construct(string $label = null, array $attributes = [])
    {
        parent::__construct('input', $attributes);
        $this->setAttribute('type', 'radio');

        if (isset($label)) {
            $this->setLabel($label);
        }
    }

    public function setValue($value): InputInterface
    {
        if (!empty($value) && (string) $this->getAttribute('value') === (string) $value) {
            return $this->setAttribute('checked', true);
        }

        return $this->removeAttribute('checked');
    }

    public function getValue()
    {
        return $this->getAttribute('checked') ? $this->getAttribute('value') : null;
    }
}
