<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;
    protected $table = 'screenings';
    protected $fillable = [
        '_id',
        'name',
        'description',
    ];

    protected $casts = [
        '_id' => 'string',
    ];

    protected $primaryKey = '_id';
}
