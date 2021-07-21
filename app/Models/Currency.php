<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    //In order to prevent auto-incrementing of the iso field in the currency table, set the incrementing property to false

    protected $primaryKey = 'iso';

    public $incrementing = false;

    protected $fillable = [
        'iso'
    ];
}
