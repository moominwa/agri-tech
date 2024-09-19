<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment; // เรียกใช้ Model Payment
use App\Models\Team;
class FormPaymentController extends Controller
{
    // ฟังก์ชันสำหรับแสดงฟอร์มการชำระเงิน
    public function create()
    {

          // ดึงข้อมูลทีมทั้งหมดจากตาราง teams
    $teams = Team::all();
    // ส่งข้อมูลทีมไปยัง view
         return view('formpayment.create', compact('teams')); // แสดงฟอร์ม
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลการชำระเงิน
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งเข้ามาจากฟอร์ม
        $request->validate([
            'team_name' => 'required|string|max:255',
            'bank_id' => 'required|string|max:255',
            'bank_repay_id' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'payment_time' => 'required|date_format:H:i',
            'payment_money' => 'required|numeric|min:0.01',
            'payment_files' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // บันทึกไฟล์ภาพหลักฐาน
        $filePath = $request->file(key: 'payment_files')->store('payments', 'public');

        // บันทึกข้อมูลลงฐานข้อมูล
        Payment::create([
            'team_id' => $request->team_id,
            'team_name' => $request->team_name,
            'bank_id' => $request->bank_id,
            'bank_repay_id' => $request->bank_repay_id,
            'payment_date' => $request->payment_date,
            'payment_time' => $request->payment_time,
            'payment_money' => $request->payment_money,
            'payment_files' => $filePath,
        ]);


        // ส่งข้อความกลับไปยังผู้ใช้หลังจากบันทึกสำเร็จ
        return redirect()->back()->with('message', 'บันทึกข้อมูลสำเร็จ');

    }

}
