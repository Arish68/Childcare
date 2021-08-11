<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
      protected $fillable = [
        'user_id',
        'subscription_id',
        'valid_from',
        'valid_to',
     
    ];

}
