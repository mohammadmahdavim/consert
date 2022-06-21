<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salled extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sans()
    {
        return $this->belongsTo(Sans::class)->withDefault();
    }

    public function program()
    {
        return $this->belongsTo(Program::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function chair()
    {
        return $this->belongsToMany(SansChair::class)->withPivot('code');
    }
}
