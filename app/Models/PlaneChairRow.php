<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneChairRow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function plane()
    {
        return $this->belongsTo(PlaneSalon::class,'plane_salon_id');
    }

    public function chair()
    {
        return $this->hasMany(PlaneChair::class);
    }
    public function chairSans()
    {
        return $this->hasMany(SansChair::class);
    }

}
