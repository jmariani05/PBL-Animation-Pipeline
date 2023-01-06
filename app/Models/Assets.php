<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AssetTypes;

class Assets extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_asset_type',
        'id_project',
        'name',
        'description',
        'code',
        'path',
        // Rigging
        'status_rigging',
        'user_rigging',
        // Concept
        'status_concept',
        'user_concept',
        // Shading
        'status_shading',
        'user_shading',
        // Modeling
        'status_modeling',
        'user_modeling',
    ];

    public function assetType(){
        return $this->belongsTo(AssetTypes::class, 'id_asset_type');
    }

    public function userRigging(){
        return $this->belongsTo(User::class, 'user_rigging');
    }

    public function userConcept(){
        return $this->belongsTo(User::class, 'user_concept');
    }

    public function userShading(){
        return $this->belongsTo(User::class, 'user_shading');
    }

    public function userModeling(){
        return $this->belongsTo(User::class, 'user_modeling');
    }
}
