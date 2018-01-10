<?php

namespace VladislavTkachenko\Admin\Display;

use SleepingOwl\Admin\Display\Column\NamedColumn;

class Color extends NamedColumn
{
    /**
     * @var string
     */
    protected $view = 'vladislavtkachenko::display.color';

    /**
     * @var bool
     */
    protected $orderable = false;

    /**
     * @return array
     */
    public function toArray()
    {
        return parent::toArray() + [
                'value'  => $this->getModelValue()
            ];
    }
}