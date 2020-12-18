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

    public function sales_items()
    {
        return $this->hasMany(Sale_iten::class, 'sales_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function bloquetes()
    {
        return $this->hasMany(Bloquete::class, 'sales_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
