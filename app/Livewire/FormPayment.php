<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Payment;
use App\Models\Team;

class FormPayment extends Component
{
    use WithFileUploads;

    public $team_name, $bank_id, $bank_repay_id, $payment_date, $payment_time, $payment_money, $payment_files;

    protected $rules = [
        'team_name' => 'required|string',
        'bank_id' => 'required|integer',
        'bank_repay_id' => 'required|integer',
        'payment_date' => 'required|date',
        'payment_time' => 'required|date_format:H:i',
        'payment_money' => 'required|numeric|min:0',
        'payment_files' => 'required|image|max:2048', // รูปต้องไม่เกิน 2MB
    ];

    public function submit()
    {
         $this->validate();

        // บันทึกข้อมูล
        $filePath = $this->payment_files->store('payments', 'public');
        Payment::create([
            'team_name' => $this->team_name,
            'bank_id' => $this->bank_id,
            'bank_repay_id' => $this->bank_repay_id,
            'payment_date' => $this->payment_date,
            'payment_time' => $this->payment_time,
            'payment_money' => $this->payment_money,
            'payment_files' => $filePath,
        ]);

        session()->flash('message', 'บันทึกข้อมูลสำเร็จ');

        // Reset ฟอร์มหลังจากบันทึก
        $this->reset();
    }

    public function render()
    {
        $teams = Team::all();
        return view('livewire.form-payment',['teams' => $teams]);
    }
};
