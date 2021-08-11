<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
class ParentChildren extends Model
{
    use Notifiable;
    protected $guarded=[];
    protected $table='parent_childrens';
    
     protected $casts = [
        'allergy' => 'array',
        'exception' => 'array'
    ];
}
