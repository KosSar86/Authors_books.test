<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthFormRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(AuthFormRequest $request)
    {
        if(auth('admin')->attempt($request->validated())) {

            return redirect(route('admin.main'));
        }
        return redirect(route('admin.login'))->withErrors(['login' => 'Введены неверные данные']);
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect(route('home'));
    }

}
