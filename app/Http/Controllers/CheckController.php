<?php
namespace App\Http\Controllers;
use App\Models\Payment; // เรียกใช้ Model Payment
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function approve($id)
    {
        // ค้นหา payment ตาม id
        $payment = Payment::findOrFail($id);
        $payment->payment_status = 'อนุมัติ'; // อนุมัติการชำระเงิน
        $payment->save();

        return response()->json(['message' => 'การชำระเงินได้รับการอนุมัติ']);
    }


    public function deny($id)
    {
        // ค้นหา payment ตาม id
        $payment = Payment::findOrFail($id);
        $payment->payment_status = 'ไม่อนุมัติ'; // ปฏิเสธการชำระเงิน
        $payment->save();

        return response()->json(['message' => 'การชำระเงินไม่ได้รับการอนุมัติ']);
    }
}
