<div class="form-group form-element-text {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }} @if($required)<span class="form-element-required">*</span>@endif</label>

    <div id="color-picker-component" class="input-group colorpicker-component">
        <input {!! $attributes !!} type="text" value="{{$value}}" class="form-control" @if($readonly) readonly @endif/>
        <span class="input-group-addon"><i></i></span>
    </div>

    @include(AdminTemplate::getViewPath('form.element.partials.helptext'))
    @include(AdminTemplate::getViewPath('form.element.partials.errors'))
</div>
