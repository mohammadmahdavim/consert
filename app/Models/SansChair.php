<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SansChair extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sans()
    {
        return $this->belongsTo(Sans::class);
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function plane()
    {
        return $this->belongsTo(PlaneSalon::class, 'plane_salon_id');
    }

    public function row()
    {
        return $this->belongsTo(PlaneChairRow::class, 'plane_chair_row_id');
    }

    public function salled()
    {
        return $this->belongsToMany(Salled::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
