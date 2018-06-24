<?php

namespace VladislavTkachenko\Admin\FormElements;

use SleepingOwl\Admin\Form\Element\Images;
use KodiCMS\Assets\Facades\Meta;

class OrderableImages extends Images
{
    public function initialize()
    {
        Meta::addCss('admin-custom-css-sort', asset('packages/vladislavtkachenko/css/orderable-images/orderable-images.css'), ['admin-default']);

        Meta::addJs('admin-custom-js-sort', asset('packages/vladislavtkachenko/js/vendor/flow.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-sort-2', asset('packages/vladislavtkachenko/js/vendor/Sortable.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-sort-3', asset('packages/vladislavtkachenko/js/orderable-images/orderable-images.js'), ['admin-default']);
    }

    public function render ()
    {
        return view('vladislavtkachenko::form-element.orderable-images', $this->toArray())->render();
    }
}