<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        "id"
    ];

    public function airport()
    {
        return $this->hasMany(Airport::class);
    }

    public function airline()
    {
        return $this->hasOne(Airline::class);
    }
}
