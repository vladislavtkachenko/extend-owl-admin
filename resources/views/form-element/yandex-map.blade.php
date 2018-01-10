<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }} an-yaMap">

    <label for="{{ $name }}" class="control-label">
        {{ $label }}
        @if($required)
            <span class="form-element-required">*</span>
        @endif
    </label>

    <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? '55.744000, 37.618314' }}">

    <div id="yaMap-{{ $name }}" style="width:100%;height:450px;margin-top:15px"></div>

    <script>
        window.onload = function() {
            $(function (){
                $('#yaMap-{{ $name }}').ymapTV({
                    'coords':'{{ $value ?? '55.744000, 37.618314' }}',
                    'tv':'#{{ $name }}'
                });
            });
        };
    </script>

    @include(AdminTemplate::getViewPath('form.element.partials.helptext'))
    @include(AdminTemplate::getViewPath('form.element.partials.errors'))
</div>