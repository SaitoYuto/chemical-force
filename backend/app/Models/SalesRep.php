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

    /**
     * One sales representative is belongs to one user 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    /**
     * One sales representative works at multiple areas 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function works()
    {
        return $this->belongsToMany(Area::class, 'workings', 'sales_rep_id', 'area_id');
    }

    /**
     * One sales oversees multiple products 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oversees()
    {
        return $this->hasMany(Product::class, 'sales_rep_id', 'id');
    }

    /**
     * One sales deals with multiple customers 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deals()
    {
        return $this->hasMany(Customer::class, 'sales_rep_id', 'id');
    }
}
