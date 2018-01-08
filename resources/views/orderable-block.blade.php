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
                <img data-src="[%=src%]" src="[%=url%]" style="height: 250px;" />
                <input type="text" class="tit" id="title" placeholder="Заголовок" >
                <textarea class="desc" id="description" rows="10" placeholder="Описание"></textarea>
                <div style="margin-bottom: 10px; text-align: center">
                    <a href="#" class="btn-sm btn-danger imageRemove">Удалить</a>
                </div>
            </div>
        </div>
    </script>

    <div class="row images-group" id="img-container">
        @foreach ($value ?? [] as $item)
            <div class="col-xs-6 col-md-3 imageThumbnail">
                <div class="thumbnail">
                    <img data-src="{{ $item[0] }}" src="{{ asset($item[0]) }}" style="height: 250px;" />
                    <input type="text" id="title" class="tit" placeholder="Заголовок" value="{{$item[1]}}">
                    <textarea id="description" class="desc" rows="10" placeholder="Описание">{{$item[2]}}</textarea>
                    <div style="margin-bottom: 10px; text-align: center">
                        <a href="#" class="btn-sm btn-danger imageRemove">Удалить</a>
                    </div>
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