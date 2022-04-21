<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;

class Service extends Model
{
    use HasFactory;

    public function incident()
    {
        return $this->hasMany(Incident::class);
    }
}
