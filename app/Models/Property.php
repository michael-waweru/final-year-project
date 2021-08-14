<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id';

    public function property_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function allocations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Allocation::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
