<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Assets;

class AssetTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function assets(){
        return $this->hasMany(Assets::class, 'id_asset_type');
    }
}
