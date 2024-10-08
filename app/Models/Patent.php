<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'status',
        'patent_agency',
        'number_and_date',
    ];
}
