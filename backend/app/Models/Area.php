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

    /**
     * One area is worked by multiple sales representatives
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workers()
    {
        return $this->belongsToMany(SalesRep::class, 'workings', 'area_id', 'sales_rep_id');
    }

    /**
     * One area is managed by one manager sales representative 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(SalesRep::class, 'manager_id', 'id');
    }
}
