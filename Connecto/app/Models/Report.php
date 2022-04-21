<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Report extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'report',
        'date',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the product that owns the ProductOption.
     */
    public function product()
    {
        return $this->belongsTo(Report::class);
    }
}

