<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_iten extends Model
{
    use HasFactory;

    protected $table = 'sales_items';

    protected $fillable = [
        'sales_id',
        'product_id',
        'name_product',
        'price',
        'amount'
    ];

    public function sale(){
        return $this->belongsTo(Sale::class, 'sales_id', 'id');
    }
}
