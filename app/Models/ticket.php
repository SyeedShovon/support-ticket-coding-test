<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'customer_name',
        'priority',
        'title',
        'description',
        'status',
    ];
}
