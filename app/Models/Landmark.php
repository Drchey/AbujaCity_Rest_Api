<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    use HasFactory;

    protected $table = 'landmarks';

    protected $fillable = [
        'name', 'local_govts_id' , 'details',
    ];

    protected function local_govts()
    {
        return $this->belongsTo('App\Models\LocalGovt');
    }
}
