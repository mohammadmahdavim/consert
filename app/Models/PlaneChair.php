<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneChair extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function row()
    {
        return $this->belongsTo(PlaneChairRow::class);
    }
}
