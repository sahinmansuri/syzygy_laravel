<?php

namespace Modules\Essentials\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EssentialsEmployeeAdvance extends Model
{
    use HasFactory;

    protected $fillable = [];
	
	const PAYMENT_STATUS_NEW = 1;
	const PAYMENT_STATUS_PARTIAL = 2;
	const PAYMENT_STATUS_FULLY_PAID = 3;
	const PAYMENT_STATUS_PENDING = 4;
	const PAYMENT_STATUSES = [
		self::PAYMENT_STATUS_NEW => "New",
		self::PAYMENT_STATUS_PARTIAL => "PatiallyPaid",
		self::PAYMENT_STATUS_FULLY_PAID => "FullyPaid",
		self::PAYMENT_STATUS_PENDING => "Pending",
	];
	
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
	
    protected static function newFactory()
    {
        return \Modules\Essentials\Database\factories\EssentialsEmployeeAdvanceFactory::new();
    }
}
