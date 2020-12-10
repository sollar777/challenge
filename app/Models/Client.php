<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'cgc',
        'phone',
        'email',
        'clients_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'client_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'clients_id', 'id');
    }
    
}
