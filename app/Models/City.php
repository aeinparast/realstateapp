<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'map'
    ];


    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
