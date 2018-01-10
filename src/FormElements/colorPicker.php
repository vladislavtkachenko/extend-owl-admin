<?php

namespace VladislavTkachenko\Admin\FormElements;

use KodiCMS\Assets\Facades\Meta;
use SleepingOwl\Admin\Form\Element\NamedFormElement;

class ColorPicker extends NamedFormElement
{
    public function __construct($path, $label = null)
    {
        parent::__construct($path, $label);

        $this->setHtmlAttributes([
            'class' => 'form-control',
            'type'  => 'text',
        ]);
    }

    public function initialize()
    {
        Meta::addCss('admin-custom-css-colorpicker', asset('vendor/vladislavtkachenko/css/color-picker/bootstrap-colorpicker.css'), ['admin-default']);

        Meta::addJs('admin-custom-js-colorpicker', asset('vendor/vladislavtkachenko/js/color-picker/bootstrap-colorpicker.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-colorpicker-js', asset('vendor/vladislavtkachenko/js/color-picker/color-picker.js'), ['admin-default']);
    }

    public function render () {
        return view('vladislavtkachenko::form-element.color-picker', $this->toArray())->render();
    }
}