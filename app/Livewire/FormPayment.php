<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Payment;
class FormPayment extends Component
{
    use WithFileUploads; // ใช้การอัพโหลดไฟล์

    public $team_name;
    public $bank_id;
    public $bank_repay_id;
    public $payment_date;
    public $payment_time;
    public $payment_money;
    public $payment_files; // สำหรับไฟล์แนบ

    protected $rules = [
        'team_name' => 'required|string',
        'bank_id' => 'required|integer',
        'bank_repay_id' => 'required|integer',
        'payment_date' => 'required|date',
        'payment_time' => 'required|date_format:H:i',
        'payment_money' => 'required|numeric',
        'payment_files' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        try {
            $payment = new Payment();
            $payment->team_name = $this->team_name;
            $payment->bank_id = $this->bank_id;
            $payment->bank_repay_id = $this->bank_repay_id;
            $payment->payment_date = $this->payment_date;
            $payment->payment_time = $this->payment_time;
            $payment->payment_money = $this->payment_money;

            if ($this->payment_files) {
                $filePath = $this->payment_files->store('payments', 'public');
                $payment->payment_files = $filePath;
            }

            $payment->save();

            session()->flash('message', 'Payment submitted successfully.');

            // Reset form fields after submission
            $this->reset();
        } catch (\Exception $e) {
            // Handle exceptions
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.form-payment');
    }
};
