<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function values(): MorphMany
    {
        return $this->morphMany(Value::class, 'valueable');
    }
}
