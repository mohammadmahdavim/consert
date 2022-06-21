<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function plan()
    {
        return $this->hasMany(PlaneSalon::class);
    }

    public function sans()
    {
        return $this->hasMany(Sans::class);
    }
}
