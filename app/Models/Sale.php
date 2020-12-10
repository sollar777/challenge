<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'store_id',
        'user_id',
        'obs',
        'date',
        'discount'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'clients_id', 'id');
    }

    public function sales_items(){
        return $this->hasMany(Sale_iten::class, 'sales_id', 'id');
    }
}
