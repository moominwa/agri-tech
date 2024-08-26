<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prefix' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            // 'team_name'=> ['required', 'string','max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // 'department' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', ],
            'student_code' => ['required', 'string', 'min:12', ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string',  'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    return DB::transaction(function () use ($data) {
        // สร้างผู้ใช้
        $user = User::create([
            'prefix' => $data['prefix'] === 'อื่นๆ' ? $data['custom_prefix'] : $data['prefix'],
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            // 'department' => $data['department'],
            'phone' => $data['phone'],
            'student_code' => $data['student_code'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'status' => 'หัวหน้าทีม',
        ]);

        // สร้างทีม
        // Team::create([
        //     'team_name' => $data['team_name'],
        //     'department' => $data['department'],
        //     'type' => 'ชาย',
        // ]);

        return $user;
    });
    
     
}

}
