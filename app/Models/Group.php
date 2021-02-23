<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function produtos()
    {
        return $this->hasMany(Product::class, "id", "group_id");
    }
}
