<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function nextId(int $increment = 1)
    {
        if (Parent::withTrashed()->count())
        {
            return parent::withTrashed()->get()->last()->id + $increment;
        }
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function landlord()
    {
        return $this->belongsTo(User::class, 'entry_id');
    }

    public function allocation()
    {
        return $this->belongsTo(Allocation::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }

//    public function entry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(User::class, 'entry_id');
//    }
}
