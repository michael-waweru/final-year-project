<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory;

    protected $table = "tenants";

    // public function allocation()
    // {
    //     return  $this->belongsTo(Allocation::class);
    // }
}
