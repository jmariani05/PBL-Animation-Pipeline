<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shots extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sequence',
        'title',
        'path',
        'frames',
        'in',
        'out',
        // Rigging
        'status_layout',
        'user_layout',
        // Concept
        'status_animation',
        'user_animation',
        // Shading
        'status_render',
        'user_render',
        // Modeling
        'status_compositing',
        'user_compositing',
    ];

    public function sequence(){
        return $this->belongsTo(Sequences::class, 'id_sequence');
    }

    public function userLayout(){
        return $this->belongsTo(User::class, 'user_layout');
    }

    public function userAnimation(){
        return $this->belongsTo(User::class, 'user_animation');
    }

    public function userRender(){
        return $this->belongsTo(User::class, 'user_render');
    }

    public function userCompositing(){
        return $this->belongsTo(User::class, 'user_compositing');
    }
}
