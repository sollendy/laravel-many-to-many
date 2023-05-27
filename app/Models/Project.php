<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', "slug", "type_id", "cover_image"];


    public function getRouteKeyName()
    {

        return 'slug';

    }

    public function type(){

        return $this->belongsTo(Type::class);

    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
