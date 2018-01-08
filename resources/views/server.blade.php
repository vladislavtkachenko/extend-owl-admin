<div class="row" style="margin-top: 50px">
    <div class="col-md-6 col-md-offset-3">
        <ul class="list-group">
            <li class="list-group-item">Операционная Система <b class="pull-right">{{ PHP_OS }}</b></li>
            <li class="list-group-item">Сервер <b class="pull-right">{{ $_SERVER['SERVER_SOFTWARE'] }}</b></li>
            <li class="list-group-item">Версия PHP <b class="pull-right">{{ phpversion() }}</b></li>
            <li class="list-group-item">IP адрес <b class="pull-right">{{ gethostbyname(gethostname()) }}</b></li>
            <li class="list-group-item">Каталог хоста <b class="pull-right">{{ gethostname() }}</b></li>
            <li class="list-group-item">Имя базы данных <b class="pull-right">{{ config('database.connections.mysql.database') }}</b></li>
            <li class="list-group-item">Версия Laravel <b class="pull-right">{{ Illuminate\Foundation\Application::VERSION }}</b></li>
            <li class="list-group-item">Серверное время <b class="pull-right">{{ Carbon\Carbon::now()->format('d.m.Y - H:i:s') }}</b></li>
        </ul>
    </div>
</div>

