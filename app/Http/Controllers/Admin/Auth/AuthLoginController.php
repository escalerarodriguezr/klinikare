<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Validator;

class AuthLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest' ,['only' => ['showLoginForm']]);
    }

    public function showLoginForm(): View
    {

        return view('admin/auth/login');

    }

    public function loginAction(Request $request): View|RedirectResponse
    {


        Validator::make(
            $request->toArray(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => trans('El email es requerido'),
                'email.email' => trans('El email introducido tiene un formato inválido'),
                'password.required' => trans('La contraseña es requerida'),
            ]
        )->validate();

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => trans('Credenciales inválidas'),
        ])->onlyInput('email');
    }

    public function logOutAction(Request $request): View|RedirectResponse
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }


}
