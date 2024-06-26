<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    public function workers()
    {
        return $this->belongsToMany(SalesRep::class, 'workings', 'area_id', 'sales_rep_id');
    }

    public function manager()
    {
        return $this->belongsTo(SalesRep::class, 'chief_manager_id', 'sales_rep_id');
    }
}
