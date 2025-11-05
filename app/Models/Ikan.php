<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $table = 'ikans';

    protected $guarded = ['id'];

    public function Kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}
