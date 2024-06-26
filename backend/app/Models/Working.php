<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working extends Model
{
    use HasFactory;

    protected $primaryKey = ['sales_rep_id', 'area_id'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['sales_rep_id', 'area_id'];

    public $timestamps = false;
}
