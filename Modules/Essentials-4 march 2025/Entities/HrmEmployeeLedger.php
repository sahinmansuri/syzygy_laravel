<?php

namespace Modules\Essentials\Entities;

use Illuminate\Database\Eloquent\Model;

class HrmEmployeeLedger extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
