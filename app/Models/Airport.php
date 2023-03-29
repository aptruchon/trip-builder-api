<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function flight()
    {
        return $this->hasMany(Flight::class);
    }
}
