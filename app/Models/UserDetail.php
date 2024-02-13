<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        '_id',
        'user_id',
        'fullname',
        'division',
    ];

    protected $casts = [
        '_id' => 'string',
    ];

    protected $primaryKey = '_id';
}
