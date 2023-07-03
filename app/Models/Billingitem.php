<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Billing;

class Billingitem extends Model
{
    //Name of table
    protected $table = 'billing_items';
    
    //Table primary key
    protected $primaryKey = 'id';
    
    //Fillable fields
    protected $fillable = [
        'bill_no', 'service_id', 'item', 'price', 'quantity', 'total'
    ];

    //Timestamp (created_at and updated_at) status
    protected $timestamp = true;

    public function billinfo(){
        return $this->belongsTo(Billing::class, 'bill_no', 'id');
    }
}
