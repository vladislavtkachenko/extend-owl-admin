<?php

namespace VladislavTkachenko\Admin\Http\Controllers;

use AdminSection;
use KodiCMS\Assets\Facades\Meta;
use VladislavTkachenko\Admin\Providers\LogServiceProvider;

class AdminController
{
    /**
     * Информация о сервере
     * @return mixed
     */
    public function server()
    {
        $content = view('vladislavtkachenko::server');
        return AdminSection::view($content, 'Информация о web-сервере');
    }

    /**
     * Лог файлы Лары
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Exception
     */
    public function log()
    {
        Meta::addCss('admin-custom-css-sort', asset('vendor/vladislavtkachenko/css/logs/logs.css'), ['admin-default']);
        Meta::addJs('admin-custom-js-logs-dt', asset('vendor/vladislavtkachenko/js/logs/dataTables.min.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-logs-dt-bstr', asset('vendor/vladislavtkachenko/js/logs/dt-bootstrap.js'), ['admin-default']);
        Meta::addJs('admin-custom-js-logs', asset('vendor/vladislavtkachenko/js/logs/logs.js'), ['admin-default']);

        if (request()->input('l')) {
            LogServiceProvider::setFile(base64_decode(request()->input('l')));
        }

        if (request()->has('dl')) {
            return response()->download(LogServiceProvider::pathToLogFile(base64_decode(request()->input('dl'))));
        }

        if (request()->has('del')) {
            app('files')->delete(LogServiceProvider::pathToLogFile(base64_decode(request()->input('del'))));
            return redirect(request()->url());
        }

        if (request()->has('delall')) {
            foreach(LogServiceProvider::getFiles(true) as $file){
                app('files')->delete(LogServiceProvider::pathToLogFile($file));
            }
            return redirect(request()->url());
        }

        $content = view('vladislavtkachenko::log', [
            'logs' => LogServiceProvider::all(),
            'files' => LogServiceProvider::getFiles(true),
            'current_file' => LogServiceProvider::getFileName()
        ]);

        return AdminSection::view($content, 'Логи');
    }
}
