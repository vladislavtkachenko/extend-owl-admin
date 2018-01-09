<?php

namespace VladislavTkachenko\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Редирект
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     * @internal param ProjectService $projectService
     */
    public function __construct()
    {
        $this->redirectTo = config('sleeping_owl.url_prefix', 'admin');
        $this->middleware('guest')->except('logout');
    }

    /**
     * Валидация
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Форма для авторизации
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('vladislavtkachenko::auth.login');
    }
}