<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class JobAssignDetail extends Model
{
    protected $table = 'job_assign_details';
    protected $fillable = ['job_assign_id','file_path','file_name','deleted_at'];
    use SoftDeletes;
}
