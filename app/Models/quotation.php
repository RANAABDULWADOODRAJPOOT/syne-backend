<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'company',
        'contact',
        'description',
        'invoice_address',
        'site_address',
        'assign_user',
        'status',
        'quote_no',
        'date',
        'company',
        'description',
        'contact',
        'linkedjob',
        'next',

    ];
}
