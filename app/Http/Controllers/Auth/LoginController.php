<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (!Auth::attempt(
            $credentials,
            $request->has('remember') && $request->get('remember')
        )) {
            abort(401, 'User not found');
        }

        return Auth::user()->only([
            'id',
            'name',
            'email',
        ]);
    }
}
