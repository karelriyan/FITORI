<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kolam;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Ikan extends Model
{
    use HasUlids;
    protected $table = 'ikans';

    protected $guarded = ['id'];

    public function Kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}
