<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compinfo extends Model
{
    //Name of table
    protected $table = 'company_info';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'ctname', 'cac_num', 'email ', 'phone_no', 'addressln1', 'city', 'state', 'img_url', 'IsActive'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;
}
