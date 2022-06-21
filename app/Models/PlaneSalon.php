<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaneSalon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function chairRow()
    {
        return $this->hasMany(PlaneChairRow::class);
    }

    public function chair()
    {
        return $this->hasMany(PlaneChair::class);
    }


}
