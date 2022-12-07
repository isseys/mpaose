<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Many cats with same body type
    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
    
}
