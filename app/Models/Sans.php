<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sans extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function salon()
    {
        return $this->belongsTo(Salon::class)->withDefault();
    }

    public function program()
    {
        return $this->belongsTo(Program::class)->withDefault();
    }

    public function chair()
    {
        return $this->hasMany(SansChair::class);
    }
}
