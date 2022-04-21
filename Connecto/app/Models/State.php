<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;


class State extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function incident()
    {
        return $this->hasMany(Incident::class);
    }
}
