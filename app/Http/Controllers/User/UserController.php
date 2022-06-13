<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\EmailVerification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Throwable;
use Tools;

class UserController extends Controller
{
    /**
     * show the form for register user
     *
     * @return \Illuminate\Http\Response
     */
    public function formRegister()
    {
        return view('registers.register');
    }

    /**
     * store new user and send verification email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'email_verify_expire_at' => Carbon::now()
            ]);
            if ($user) {
                $link = Tools::createLink($user->id);
                if ($link->status) {
                    Notification::send($user, new EmailVerification($user, $link->link));
                }
            }
            return response()->json([
                'message' => 'Register Success',
            ]);
        } catch (Throwable $th) {
            Log::info($th->getMessage());
        }
    }

    /**
     * verification email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function verification(Request $request)
    {
        try {
            $signature = $request->signature;
            $token = $request->token;
            $verify = Tools::emailVerify($signature,$token);
            if ($verify) {
                return view('registers.verified', compact('verify'));
            } else {
                return view('registers.verified', compact('verify'));
            }
        } catch (Throwable $th) {
            Log::info($th->getMessage());
        }
    }

    /**
     * show the form for login user
     *
     * @return \Illuminate\Http\Response
     */
    public function formLogin()
    {
        return view('authentication.login');
    }

    /**
     * login user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'not_match' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
