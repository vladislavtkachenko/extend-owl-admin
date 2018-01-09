<div class="form-group form-element-images imageUploadMultiple {{ $errors->has($name) ? 'has-error' : '' }}"
     data-target="{{ route('admin.form.element.image', [
				'adminModel' => AdminSection::getModel($model)->getAlias(),
				'field' => $path,
				'id' => $model->getKey()
			])  }}" data-token="{{ csrf_token() }}">

    <label for="{{ $name }}" class="control-label">
        {{ $label }}
        @if($required)
            <span class="form-element-required">*</span>
        @endif
    </label>

    <script type="text/html" class="RenderPhoto">
        <div class="col-xs-6 col-md-3 imageThumbnail">
            <div class="thumbnail">
                <img data-src="[%=src%]" src="[%=url%]" />
                <a href="#" class="btn-sm btn-danger imageRemove">Удалить</a>
            </div>
        </div>
    </script>

    <div class="row images-group" id="img-container">
        @foreach ($value ?? [] as $image)
            <div class="col-xs-6 col-md-3 imageThumbnail">
                <div class="thumbnail">
                    <img data-src="{{ $image }}" src="{{ asset($image) }}" />
                    <a href="#" class="btn-sm btn-danger imageRemove">Удалить</a>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        <div class="btn btn-primary imageBrowse">Выбрать изображения</div>
    </div>

    <input name="{{ $name }}" class="imageValue" type="hidden" value="">

    <div class="errors">
        @include(AdminTemplate::getViewPath('form.element.partials.errors'))
    </div>
</div>












