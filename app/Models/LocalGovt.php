<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovt extends Model
{
    use HasFactory;

    protected $table = 'local_govts';

    protected $fillable = [
        'name', 'head', 'description', 'population',
    ];

    public function estates()
    {
        return $this->hasMany('App\Models\Estate');
    }

    public function landmarks()
    {
        return $this->hasMany('App\Models\Landmarks');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }
}
