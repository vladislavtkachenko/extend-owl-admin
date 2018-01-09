<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-2 sidebar">
            <div class="list-group">
                @foreach($files as $file)
                    <a href="?l={{ base64_encode($file) }}"
                       class="list-group-item @if ($current_file == $file) llv-active @endif">
                        {{$file}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-10 col-md-10 table-container">
            @if ($logs === null)
                <div>
                    Файл >50M, скачайте его для просмотра.
                </div>
            @else
                <div>
                    @if($current_file)
                        <a href="?dl={{ base64_encode($current_file) }}">
                            <span class="glyphicon glyphicon-download-alt"></span>
                            Скачать файл
                        </a>
                        -
                        <a id="delete-log" href="?del={{ base64_encode($current_file) }}">
                            <span class="glyphicon glyphicon-trash"></span>
                            Удалить файл
                        </a>
                        @if(count($files) > 1)
                            -
                            <a id="delete-all-log" href="?delall=true">
                                <span class="glyphicon glyphicon-trash"></span>
                                Удалить все файлы
                            </a>
                        @endif
                    @endif
                </div>
                <table id="table-log" class="table table-striped admin-table">
                    <thead>
                    <tr>
                        <th>Уровень</th>
                        <th>Дата</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $key => $log)
                            <tr data-display="stack{{{$key}}}">
                                <td class="text-{{{$log['level_class']}}}">
                                    <span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign"
                                          aria-hidden="true"></span> &nbsp;{{$log['level']}}
                                </td>
                                <td class="date">{{{$log['date']}}}</td>
                                <td class="text">
                                    @if ($log['stack'])
                                        <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </a>
                                    @endif

                                    {{$log['text']}}

                                    @if (isset($log['in_file']))
                                        <br/>{{$log['in_file']}}
                                    @endif

                                    @if ($log['stack'])
                                        <div class="stack" id="stack{{$key}}" style="display: none; white-space: pre-wrap;">
                                            {{ trim($log['stack']) }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>