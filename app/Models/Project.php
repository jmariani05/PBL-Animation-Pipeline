<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'fps',
        'ratio',
        'resolution',
        'start_date',
        'end_date',
    ];

    public function team()
    {
        return $this->hasMany(ProjectTeam::class, 'id_project');
    }
}
