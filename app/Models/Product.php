<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'name',
        'description',
        'price_cost',
        'price',
        'amount',
        'group_id'
    ];

    public function groups()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
