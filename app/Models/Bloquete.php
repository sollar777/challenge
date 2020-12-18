<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloquete extends Model
{
    use HasFactory;

    protected $table = 'bloquetes';

    protected $fillable = [
        'sales_id',
        'description',
        'valor_parcela'
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class, 'sales_id', 'id');
    }
}
