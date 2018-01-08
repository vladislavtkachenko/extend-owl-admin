<?php

namespace VladislavTkachenko\Admin\FormElements;

use Illuminate\Http\Request;
use KodiCMS\Assets\Facades\Meta;
use SleepingOwl\Admin\Form\Element\Images;

class OrderableBlock extends Images
{
    public function initialize()
    {
        Meta::addCss('admin-custom-css-sort', asset('vendor/vladislavtkachenko/css/orderable-block/orderable-block.css'), ['admin-default']);

        Meta::addJs('admin-custom-js-sort', asset('vendor/vladislavtkachenko/js/vendor/flow.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-sort-2', asset('vendor/vladislavtkachenko/js/vendor/Sortable.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-sort-3', asset('vendor/vladislavtkachenko/js/orderable-block/orderable-block.js'), ['admin-default']);
    }

    public function render () {
        return view('vladislavtkachenko::orderable-block', $this->toArray())->render();
    }

    public function getValueFromModel()
    {
        $value = $this->model->{$this->name};
        return json_decode(isset($value) && strlen($value) > 5 ? $value : '[]');
    }

    public function save(Request $request)
    {
        $name = $this->getName();
        $value = $request->input($name, '');
        $value = substr(substr($value, 0, -1), 1);

        $request->merge([$name => $value]);

        $this->setModelAttribute(
            $this->getValueFromRequest($request)
        );
    }
}