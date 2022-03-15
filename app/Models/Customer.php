<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function asset(){
        return $this->belongsTo(Asset::class, 'asset_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}