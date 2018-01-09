@if(Session::has('message'))
    <h3>{{ Session::get('message') }}</h3>
@endif

<div class="container">
    <div class="row">
        <form action="{{route('robots.post')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <textarea name="robots" rows="30" style="width: 100%; resize: none">{{$robots}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
</div>