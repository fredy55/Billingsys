<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servcat extends Model
{
    //Name of table
    protected $table = 'servicat';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'category_id', 'category', 'description'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;
}
