<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobAssign;
use App\JobAssignDetail;
use App\JobAssignOperator;
use App\MemberWorkDone;
use App\Admin;
use App\Role;
use Auth;
use DB;
use File;
use Carbon\Carbon;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //dd('here');
        $currentuserid = Auth::guard('admin')->user()->role;
        $role = Role::Where('roles.id','=',$currentuserid)->first();

        if($currentuserid == 1){
        	$jobLists = JobAssign::all();
        }else{
        	$jobLists = JobAssign::Where('job_assigns.operator_id','=',$role->id)
        	->get();
        }

        return view('admin.operator.index', compact('jobLists'));
    }

    public function detail($id)
    {

        $jobDetails = JobAssignDetail::Where('job_assign_details.job_assign_id','=',$id)->get();
        //dd($jobDetails);
        return view('admin.operator.detail', compact('jobDetails'));
    }

    public function download(Request $request)
    {
        $user_id = Auth::guard('admin')->user()->id;
        $user_role = Auth::guard('admin')->user()->role;
        $jobDetailId = $request->id;
        $operatorId = Role::Where('roles.id','=',$user_role)->select('roles.id')->first();
        $download_time = Carbon::now();

        $data = [
            'user_id' => $user_id,
            'user_role' => $user_role,
            'job_assign_details_id' => $jobDetailId,
            'job_assign_operators_id' => $operatorId->id,
            'status' => 'downloaded',
            'download_time' => $download_time,
        ];

        MemberWorkDone::create($data);

        return $data;
    }
}
