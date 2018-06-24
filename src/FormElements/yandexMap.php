<?php

namespace VladislavTkachenko\Admin\FormElements;

use KodiCMS\Assets\Facades\Meta;
use SleepingOwl\Admin\Form\Element\NamedFormElement;

class YandexMap extends NamedFormElement
{
    public function initialize()
    {
        Meta::addJs('admin-custom-js-yamap-api', asset('packages/vladislavtkachenko/js/yandex-map/ya-api.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-yamap', asset('packages/vladislavtkachenko/js/yandex-map/yandex-map.js'), ['admin-default']);
    }

    public function render ()
    {
        return view('vladislavtkachenko::form-element.yandex-map', $this->toArray())->render();
    }
}