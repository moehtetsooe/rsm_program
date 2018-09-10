<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberWorkDone extends Model
{
    protected $table = 'member_work_dones';
    protected $fillable = ['user_id','job_assign_details_id','job_assign_operators_id','performance','status','download_time','upload_time'];
}
