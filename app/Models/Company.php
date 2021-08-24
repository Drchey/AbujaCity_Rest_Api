<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name', 'description', 'social_id',
    ];

    protected function socials()
    {
        return $this->belongsTo('App\Models\Socials');
    }

    protected function local_govts()
    {
        return $this->belongsTo('App\Models\LocalGovt');
    }
}
