<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'company',
        'town',
        'address',
        'email',
        'telephone',
        'mobile',
        'tags'
    ];
}
