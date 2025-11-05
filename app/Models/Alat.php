<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alats';

    protected $guarded = ['id'];

    public function Kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}
