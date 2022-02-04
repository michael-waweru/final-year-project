<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class,'entry_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invoicePay()
    {
        return $this->hasMany(InvoicePay::class);
    }

    public static function isExpired($id): bool
    {
        $allocation = self::find($id);
        $start = $allocation->created_at;
        $end = $start->addMonths($allocation->period);
        return now()->diffInDays($end,false) < 1;
    }

    public static function getValid()
    {
        return self::whereNull('increment_at')->get();
    }

    public static function getExpired()
    {
        return self::whereNotNull('increment_at')->get();
    }
}
