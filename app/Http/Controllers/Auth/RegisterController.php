<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prefix' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'student_code' => ['required', 'string', 'min:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'prefix' => $data['prefix'] === 'อื่นๆ' ? $data['custom_prefix'] : $data['prefix'],
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'student_code' => $data['student_code'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return $user;
        });
    }

    // เพิ่มฟังก์ชัน register ที่นี่
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        Auth::logout();  // ออกจากระบบหลังจากที่ลงทะเบียนสำเร็จ

        return redirect('/login')->with('success', 'ลงทะเบียนสำเร็จแล้ว กรุณาเข้าสู่ระบบ');
    }
}
