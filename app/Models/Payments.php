<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Parent_;

class Payments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function nextId(int $increment = 1)
    {
        if (parent::withTrashed()->count())
        {
            return Parent::withTrashed()->get()->last()->id + $increment;
        }
    }

    public function allocation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Allocation::class);
    }

    public function entry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function landlord(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Allocation::class, 'entry_id');
    }

    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    protected $casts = [
        'month' => 'json',
    ];
}
