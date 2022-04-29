<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\ReportService;




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
        'detail',
        'date',
        'frequent_issue_id',

    ];
/**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
    ];
    /**
     * Get the product that owns the ProductOption.
     */
    public function frequentIssues()
    {
        return $this->belongsToMany(Report::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}

