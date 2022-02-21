<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kph extends Model
{
    protected $guarded = [];

    public function assets(){
        return $this->hasMany(Kph::class);
    }
}