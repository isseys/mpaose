<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Each cat has a body type
    public function body()
    {
        return $this->belongsTo(Body::class);
    }

    // Each cat has a breed type
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    // each cat has a breed type
    public function coat()
    {
        return $this->belongsTo(Coat::class);
    }
    // each cat has a Origin type
    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    // Each cat has a body Pattern type
    public function bodyPattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    // Each cat belongs to a type
    public function type()
    {
        return $this->belongsTo(Pattern::class);
    }
}
