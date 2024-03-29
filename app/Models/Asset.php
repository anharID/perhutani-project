<?php

namespace App\Models;

use App\Models\Kph;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kph(){
        return $this->belongsTo(Kph::class, 'kph_id');
    }
    public function attachments(){
        return $this->hasMany(Attachment::class);
    }
    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}