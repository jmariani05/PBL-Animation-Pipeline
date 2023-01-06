<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequences extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_episode',
    ];

    public function episode(){
        return $this->belongsTo(Episodes::class, 'id_episode');
    }

    public function shots(){
        return $this->hasMany(Shots::class, 'id_sequence');
    }
}
