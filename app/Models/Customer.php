<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\ParentNotification;
use App\Models\MeetingNotification;
use App\Models\RateNotification;
use App\Models\ApprovedRejectNotification;
use Laravel\Cashier\Billable;
class Customer extends Model
{

   // use SoftDeletes;
use Notifiable,Billable;
	protected $guarded=[];
    protected $table='customers';
    protected $casts = [
        'skills' => 'array',
        'subscription_status' => 'boolean',
        'admin_approved' => 'boolean',
        'subscription_trial'=> 'boolean'
    ];
    public function getNotificationCount($user_id)
    {
        $parent_count = ParentNotification::where([['parent_id',$user_id],['status',0]])->count();
        $meeting_count = MeetingNotification::where([['customer_id',$user_id],['status',0]])->count();
        $approved_count = ApprovedRejectNotification::where([['teacher_id',$user_id],['status',0]])->count();
        $rate_noti = RateNotification::where([['viewer_id',$user_id],['status',0]])->count();
        $total = $parent_count+$meeting_count+$approved_count+$rate_noti;
        return $total;
    }
     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'trial_ends_at'
    ];

}
