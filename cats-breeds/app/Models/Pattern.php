<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Many cats with same patterns type
    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
