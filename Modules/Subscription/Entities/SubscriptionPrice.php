<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SubscriptionPrice extends Model
{
    protected $guarded = ['id'];

}
