<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictureterrain extends Model
{
    use HasFactory;
    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    protected $fillable = [
        
        'terrain_id',
        'photo',
  
     
    ];
}
