<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'bank_id',
        'bank_repay_id',
        'payment_date',
        'payment_time',
        'payment_money',
        'payment_files',
    ];

}
