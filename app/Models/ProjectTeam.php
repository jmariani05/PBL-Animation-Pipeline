<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_project',
        'id_user',
    ];

    public function project(){
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
