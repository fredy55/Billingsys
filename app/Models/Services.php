<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //Name of table
    protected $table = 'service';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'service_id', 'category_id', 'sname', 'description', 'price'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;
}
