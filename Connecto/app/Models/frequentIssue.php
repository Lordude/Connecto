<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class frequentIssue extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
