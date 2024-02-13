<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        '_id',
        'first_name',
        'last_name',
        'nik',
        'birth_date',
        'full_address',
        'created_by',
        'screening_id',
        'status'
    ];

    protected $casts = [
        '_id' => 'string',
    ];

    protected $primaryKey = '_id';
}
