<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id';

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function invocies()
    {
        return $this->hasMany(User::class);
    }
}
