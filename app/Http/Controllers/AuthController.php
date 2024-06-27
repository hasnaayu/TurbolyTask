<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('pages.auth.login', ['title' => 'Login']);
    }

    public function register_view()
    {
        return view('pages.auth.register', ['title' => 'Register']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:6',
            'conf_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $data = [
                'success' => true,
                'message' => 'Registrasi berhasil!',
                'redirect_url' => '/auth/login'
            ];
        } catch (\Exception $exception) {
            $data = [
                'success' => false,
                'message' => 'Oops! Something wrong! Code : ' . $exception->getMessage()
            ];
        }
        return response()->json($data);
    }

    public function login(Request $request)
    {
        try {
            $existing_user = User::where('email', $request->email)->first();
            if ($existing_user) {
                if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
                    $user = User::where('id', Auth::id())
                        ->first();
                    return response()->json([
                        'success' => true,
                        'message' => 'Berhasil login!',
                        'redirect_url' => '/home'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Pastikan email/password yang Anda masukkan benar!'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Akun tidak ditemukan!'
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Oops! Something wrong! Code : ' . $exception->getMessage()
            ]);
        }
    }

    public function logout()
    {
        try {
            Session::flush();

            Auth::logout();

            return redirect('/');
        } catch (\Exception $exception) {
            return redirect('/home');
        }
    }
}
