<?php

namespace Modules\Airline\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AirTicketInvoice extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Airline\Database\factories\AirTicketInvoiceFactory::new();
    }
}
