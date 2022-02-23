<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     *  The attributres that are mass assignable. 
     * 
     */

    protected $fillable = [
        'name',
        'email',
        'phone',
        'transmission'
    ];
}
