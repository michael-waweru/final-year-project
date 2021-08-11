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

    // public function tenant()
    // {
    //     return $this->belongsTo(Tenant::class);
    // }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function isExpired($id)
    {
        $allocation = self::find($id);
        $start = $allocation->created_at;
        $end = $start->addMonths($allocation->period-1);
        return now()->diffInDays($end,false) < 1 ? true:false;
    }

    public static function getValid()
    {
        return self::whereNull('created')->get();
    }

    public static function getExpired()
    {
        return self::whereNotNull('created')->get();
    }
}
