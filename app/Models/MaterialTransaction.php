<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MaterialTransaction extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (Wajib ada agar tidak error Mass Assignment)
    protected $fillable = [
        'material_id',
        'user_id',
        'type',       // 'in' atau 'out'
        'quantity',
        'date',
        'description'
    ];

    // Relasi: Transaksi ini milik Bahan Baku apa?
    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    // Relasi: Siapa user (staff) yang mencatat?
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
