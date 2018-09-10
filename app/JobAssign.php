<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class JobAssign extends Model
{
    protected $table = 'job_assigns';
    protected $fillable = ['job_code','job_info','from_date','to_date','estimate_complete_time','created_by','operator_id','update_by','deleted_by','deleted_at'];
    use SoftDeletes;

    protected $casts= [
	 	'operator_id'=> 'array',
	];
}
