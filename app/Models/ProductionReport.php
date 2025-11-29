<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class ProductionReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity_result',
        'quantity_reject',
        'production_date',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke User (Siapa operator yang lapor?)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
