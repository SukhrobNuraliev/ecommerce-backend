<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Value extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ["name", "added_price"];

    public array $translatable = ["name"];

    public function valueable(): BelongsTo
    {
        return $this->morphTo();
    }
}
