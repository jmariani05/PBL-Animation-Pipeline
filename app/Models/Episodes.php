<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_project',
    ];

    public function project(){
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function sequences(){
        return $this->hasMany(Sequences::class, 'id_episode');
    }
}
