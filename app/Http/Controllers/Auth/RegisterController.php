<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // ตรวจสอบข้อมูล
        $validator = Validator::make($request->all(), [
            'prefix' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'student_code' => 'required|unique:users,student_code|max:13',
            'phone' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // บันทึกผู้ใช้ใหม่
        User::create([
            'prefix' => $request->prefix,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'student_code' => $request->student_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => true, // เพิ่มบรรทัดนี้เพื่อบันทึกสถานะเป็นหัวหน้าทีม
        ]);
        

        // ส่งผู้ใช้ไปที่หน้าหลักหรือหน้าที่กำหนดเอง
        return redirect()->route('home');
    }

    // ฟังก์ชันสำหรับตรวจสอบรหัสนักศึกษาซ้ำแบบ Ajax
    public function checkStudentCode(Request $request)
    {
        $exists = User::where('student_code', $request->student_code)->exists();
        return response()->json(['isAvailable' => !$exists]);
    }

    public function showRegistrationForm()
{
    return view('auth.register'); // ชี้ไปที่ view การลงทะเบียน
}

}
