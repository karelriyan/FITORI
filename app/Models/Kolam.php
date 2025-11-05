<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
    protected $table = 'kolams';

    protected $guarded = ['id'];

    public function Ikan()
    {
        return $this->hasMany(Ikan::class);
    }

    public function Alat()
    {
        return $this->hasMany(Alat::class);
    }

}
