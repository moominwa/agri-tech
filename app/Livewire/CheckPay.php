<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;

class CheckPay extends Component
{
    public $payments ,$count = 0;

    public function mount()
    {
        // โหลดข้อมูลครั้งเดียวตอน component ถูก mount
        $this->payments = Payment::all();
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->payment_status = 'อนุมัติ';
        $payment->save();
        // อัปเดตข้อมูลที่ถูกโหลดใหม่
        session()->flash('message', 'การชำระเงินได้รับการอนุมัติแล้ว');

        redirect()->route('check_pay');
    }

    public function deny($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->payment_status = 'ไม่อนุมัติ';
        $payment->save();
        session()->flash('message', 'การชำระเงินยกการอนุมัติแล้ว');
        redirect()->route('check_pay');
    }



    public function render()
    {
        return view('livewire.check-pay', [
            'payments' => $this->payments,
        ]);
    }
}
