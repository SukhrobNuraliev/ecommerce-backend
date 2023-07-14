<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'percent', 'sum', 'from', 'to'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
