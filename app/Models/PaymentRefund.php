<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRefund extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }


    public function entry()
    {
        return $this->belongsTo(User::class,'entry_id');
    }
}
