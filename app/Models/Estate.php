<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $table = 'estates';

    protected $fillable = [
        'name', 'local_govts_id',
    ];

    public function local_govts()
    {
        return $this->belongsTo('App\Models\LocalGovt');
    }


}
