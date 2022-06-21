<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function controller()
    {
        return $this->belongsToMany(User::class,'control_program','control_id','program_id');
    }

    public function organizer()
    {
        return $this->belongsToMany(User::class,'organizer_program','organizer_id','program_id');
    }

    public function sans()
    {
        return $this->hasMany(Sans::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
