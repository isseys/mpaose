<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Many cats with same origin type
    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
