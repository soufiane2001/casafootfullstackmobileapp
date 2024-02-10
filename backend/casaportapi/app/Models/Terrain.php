<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    public function pictureterrain()
    {
        return $this->hasMany(Pictureterrain::class);
    }


    protected $fillable = [
        
        'nom',
        'description',
        
     
    ];
}
