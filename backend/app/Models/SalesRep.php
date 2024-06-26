<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    public function works()
    {
        return $this->belongsToMany(Area::class, 'workings', 'sales_rep_id', 'area_id');
    }

    public function oversees()
    {
        return $this->hasMany(Product::class, 'sales_rep_id', 'id');
    }

    public function deals()
    {
        return $this->hasMany(Customer::class, 'sales_rep_id', 'id');
    }
}
