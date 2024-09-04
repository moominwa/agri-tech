<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // ตรวจสอบบทบาทของผู้ใช้
        $user = Auth::user();
        if ($user->user_type == 2) {
            // หากเป็นแอดมิน
            return '/admin/dashboard';
        } elseif ($user->user_type == 1) {
            // หากเป็นหัวหน้าทีม
            return '/home';
        }

        // ค่าเริ่มต้นถ้าไม่มีการระบุ user_type ที่ตรง
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
