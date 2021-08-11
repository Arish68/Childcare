<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'stripe_plan',
        'stripe_product_id',
        'title',
        'sub_title',
        'description',
        'duration',
        'currency',
        'plan_duration',
        'price',
        'sort_order',
        'status',
    ];

}
