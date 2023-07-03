<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //Name of table
    protected $table = 'client_info';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'ctname', 'email ', 'phone_no', 'addressln1', 'city', 'state', 'IsActive'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;

    public function billinfo()
    {
        return $this->hasMany(Billingitem::class, 'client_id', 'id');
    }
}
