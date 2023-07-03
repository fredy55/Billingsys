<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Billingitem;
use App\Models\Clients;

class Billing extends Model
{
    //Name of table
    protected $table = 'billing_info';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'bill_no', 'client_id', 'type', 'total_amt', 'amt_paid', 'balance'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;
    
    public function billitems()
    {
        return $this->hasMany(Billingitem::class, 'bill_no', 'id');
    }

    public function clients(){
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
