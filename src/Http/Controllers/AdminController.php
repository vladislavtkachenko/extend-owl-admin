<?php

namespace VladislavTkachenko\Admin\Http\Controllers;

use AdminSection;

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

}
